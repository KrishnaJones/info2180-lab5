window.onload = function ()
{
    let searchBtn = document.querySelector("#lookup");
    let searchIpt = document.querySelector("#country");

    searchBtn.addEventListener('click', function (event)
    {
        event.preventDefault();
        const input = searchIpt.value.trim();
        console.log(input);

        const httpRequest = new XMLHttpRequest();
        const url = `world.php?country=${input}`;

        httpRequest.onreadystatechange = function ()
        {
            if (httpRequest.readyState === XMLHttpRequest.DONE)
            {
                if (httpRequest.status === 200)
                {
                    document.getElementById("result").innerHTML = httpRequest.responseText;
                }
            }
        };

        httpRequest.open('GET', url);
        httpRequest.send();
    });
};
