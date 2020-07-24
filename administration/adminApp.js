zip.workerScripts = {
	deflater: ['../vendors/zip.js/WebContent/z-worker.js', '../vendors/zip.js/WebContent/deflate.js'],
	inflater: ['../vendors/zip.js/WebContent/z-worker.js', '../vendors/zip.js/WebContent/inflate.js']
};

(function (obj) {

	const requestFileSystem = obj.webkitRequestFileSystem || obj.mozRequestFileSystem || obj.requestFileSystem;

	function onerror(message) {
		alert(message);
	}

	function createTempFile(callback) {
		const tmpFilename = "tmp.dat";
		requestFileSystem(TEMPORARY, 4 * 1024 * 1024 * 1024, (filesystem) => {
			function create() {
				filesystem.root.getFile(tmpFilename, {
					create: true
				}, (zipFile) => {
					callback(zipFile);
				});
			}

			filesystem.root.getFile(tmpFilename, null, (entry) => {
				entry.remove(create, create);
			}, create);
		});
	}

	const model = (() => {

		return {
			getEntries: function (file, onend) {
				zip.createReader(new zip.BlobReader(file), (zipReader) => {
					zipReader.getEntries(onend);
				}, onerror);
			},
			getEntryFile: (entry, creationMethod, onprogress) => {
				let writer, zipFileEntry;

				function getData() {
					entry.getData(writer, (blob) => {
						const xmlContainer = document.getElementById("xml-container");
						blob.text().then((data) => {
							const str = data.replace(/w:/gi, "w");
							xmlContainer.innerHTML = str;

							var parser = new DOMParser();
							var xmlDoc = parser.parseFromString(str, "text/xml");
							let i = 0;
							getXml(xmlDoc.querySelector("wbody"));

						});
					}, onprogress);
				}

				if (creationMethod == "Blob") {
					writer = new zip.BlobWriter();
					getData();
				} else {
					createTempFile((fileEntry) => {
						zipFileEntry = fileEntry;
						writer = new zip.FileWriter(zipFileEntry);
						getData();
					});
				}
			}
		};
	})();

	(function () {
		const fileInput = document.getElementById("word");
		const BlobString = "Blob";

		function download(entry) {
			model.getEntryFile(entry, BlobString);
		}

		fileInput.addEventListener('change', () => {
			model.getEntries(fileInput.files[0], (entries) => {
				entries.forEach((entry) => {
					if (entry.filename === 'word/document.xml') {
						download(entry);
					}
				});
			});
		}, false);
	})();


})(this);

function getXml(node) {
	let mode = "";
	let tab = [];

	console.log("cc");
	if(mode === "lettre") {

		if(node.nodeName === "wt") {
			tab.push({"type":"h1", "content": node.textContent});
			mode = "";
		}
	}
	if (mode === "mot") {
		if(node.nodeName === "wr" ) {
			tab.push({"type":"h2", "content": node.textContent});
			mode = "definition";
		}
	}
	
    if ((mode === "definition") && (node.attributes == undefined)) {
        tab.push({"type":"text", "content": node.textContent});
	}
	

	node.childNodes.forEach((e) => {
		getXml(e);
	})

}