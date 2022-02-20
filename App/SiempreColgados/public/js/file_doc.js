const input = document.getElementById('image_uploads');
const preview = document.querySelector('.preview');

input.style.opacity = 0;

input.addEventListener('change', updateImageDisplay);


function updateImageDisplay() {
  while(preview.firstChild) {
    preview.removeChild(preview.firstChild);
  }

  const curFiles = input.files;
  if(curFiles.length === 0) {
    const para = document.createElement('p');
    para.textContent = 'No hay archivos seleccionados';
    preview.appendChild(para);
  } else {
    const list = document.createElement('ol');
    preview.appendChild(list);

    for(const file of curFiles) {
      const listItem = document.createElement('li');
      listItem.className += "liFile"
      const para = document.createElement('p');
      if(!validFileType(file)) {
        para.textContent = `ARCHIVO: ${file.name}`;
        listItem.appendChild(para);
      } else {
        para.textContent = `Archivo ${file.name}: El tipo de archivo no es valido. Introduce un nuevo archivo`;
        listItem.appendChild(para);
      }

      list.appendChild(listItem);
    }
  }
}

const fileTypes = [
  "image/apng",
  "image/bmp",
  "image/gif",
  "image/jpeg",
  "image/pjpeg",
  "image/png",
  "image/svg+xml",
  "image/tiff",
  "image/webp",
  "image/x-icon"
];

function validFileType(file) {
  return fileTypes.includes(file.type);
}
