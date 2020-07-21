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
							console.log(xmlDoc);
							xmlDoc.querySelectorAll('wsz[wval="144"]').forEach((e) => {
								const wrprParent = e.parentNode;
								if(wrprParent !== null) {
									const lettre = wrprParent.parentNode.querySelector('wt');
									if (lettre !== null)
										console.log(lettre.textContent)
								}
							});
							xmlDoc.querySelectorAll('wpStyle[wval="Titre1"]').forEach((e) => {
								const wpstyleParent = e.parentNode;
								if(wpstyleParent !== null) {
									const mot = wpstyleParent.parentNode.querySelectorAll('wt');
									if (mot !== null) {
										const textMot1 = mot[0].textContent;
										let textMot = textMot1;
										for(let i = 1;mot[i] !== undefined;i++){
											const textMot2 = mot[1].textContent;
											textMot += textMot2;
										}
										console.log(textMot)
									}
								}
							});
							xmlDoc.querySelectorAll('wpStyle[wval="Titre2"]').forEach((e) => {
								const wpstyleParent = e.parentNode;
								if(wpstyleParent !== null) {
									const sousTitre = wpstyleParent.parentNode.querySelectorAll('wt');
									if (sousTitre !== null && sousTitre[0] !== undefined) {
										const textSousTitre1 = sousTitre[0].textContent;
										let textSousTitre = textSousTitre1;
										for(let i = 1; sousTitre[i] !== undefined; i++){
											const textSousTitre2 = sousTitre[i].textContent;
											textSousTitre += textSousTitre2;
										}
										console.log(textSousTitre)
									}
								}
							});


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