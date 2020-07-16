zip.workerScripts = {
    deflater: ['../vendors/zip.js/WebContent/z-worker.js', '../vendors/zip.js/WebContent/deflate.js'],
    inflater: ['../vendors/zip.js/WebContent/z-worker.js', '../vendors/zip.js/WebContent/inflate.js']
};

((obj) => {

    var model = (() => {
        var URL = obj.webkitURL || obj.mozURL || obj.URL;

        return {
            getEntries: (file, onend) => {
                zip.createReader(new zip.BlobReader(file), function (zipReader) {
                    zipReader.getEntries(onend);
                }, onerror);
            },
            getEntryFile: (entry, creationMethod, onend, onprogress) => {
                var writer, zipFileEntry;

                function getData() {
                    entry.getData(writer, (blob) => {
                        var blobURL = creationMethod == "Blob" ? URL.createObjectURL(blob) : zipFileEntry.toURL();
                        onend(blobURL);
                    }, onprogress);
                }

                if (creationMethod == "Blob") {
                    writer = new zip.BlobWriter();
                    getData();
                } else {
                    createTempFile(function (fileEntry) {
                        zipFileEntry = fileEntry;
                        writer = new zip.FileWriter(zipFileEntry);
                        getData();
                    });
                }
            }
        };
    })();

    var fileInput = document.getElementById("word");
    fileInput.addEventListener('change', () => {
        model.getEntries(fileInput.files[0], (entries) => {
            entries.forEach((entry) => {
                const fileName = entry.filename;
                if (fileName === 'word/document.xml') {
                    
                }
            }, false);
        });
    }, false);
})(this);