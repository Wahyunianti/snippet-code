
function previewFile() {
    var preview = document.getElementById('previewImage');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "{{ asset('img/user.png') }}";
    }
};

var maxInputs = 9;
var inputCount = 0;

document.getElementById("gelas").addEventListener("click", function(event) {
    event.preventDefault();

    if (inputCount < maxInputs) {
        var inputFile = document.getElementById("snipcode");
        var snipcodeDiv = document.createElement("div");
        snipcodeDiv.className = "snipcode";

        
        var row2 = document.createElement("div");
        row2.className = "row";
        var p2 = document.createElement("p");
        p2.textContent = "Nama Kode";
        var input2 = document.createElement("input");
        input2.type = "text";
        input2.name = "nama[]";
        input2.className = "styled-input";
        input2.placeholder = "Nama Kode";

        row2.appendChild(p2);
        row2.appendChild(input2);
 
        var row1 = document.createElement("div");
        row1.className = "row";
        
        var p1 = document.createElement("p");
        p1.textContent = "Kode";
        
        var textarea1 = document.createElement("textarea");
        textarea1.name = "kode[]";
        textarea1.className = "styled-input";
        textarea1.placeholder = "Potongan Kode";
        
        row1.appendChild(p1);
        row1.appendChild(textarea1);


        snipcodeDiv.appendChild(row2);
        snipcodeDiv.appendChild(row1);

        var deleteButton = document.createElement("a");
        deleteButton.href = "#";
        deleteButton.style.textDecoration = "none";
        deleteButton.style.float = "right";
        deleteButton.style.color = "#fff";
        deleteButton.style.fontFamily = "Poppins, sans-serif";
        deleteButton.textContent = "X";
        deleteButton.className = "cmn-btn btn-sm";
        deleteButton.style.marginTop = "10px";
        deleteButton.addEventListener("click", function(event) {
            event.preventDefault();
            snipcodeDiv.parentNode.removeChild(snipcodeDiv);
            inputCount--;
        });

        snipcodeDiv.appendChild(deleteButton);

        document.getElementById("column").appendChild(snipcodeDiv);

        inputFile.insertAdjacentElement("afterend", snipcodeDiv);
        inputCount++;

    }
});