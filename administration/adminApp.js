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
							// xmlContainer.textContent = str;
							// const test = $("w[t]").text();
							// console.log(test);
							xmlContainer.innerHTML = str;
							var xml = $('xml-container').html();
							var xmlDoc = $.parseXML(xml);
							var $xml = $(xmlDoc);

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