    window.addEventListener("beforeunload", (evento) => {
        if (true) {
            evento.preventDefault();
            evento.returnValue = "";
            return "";
        }
    });
