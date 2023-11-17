document.addEventListener("DOMContentLoaded", () => 
{
    const searchbtn = document.querySelector("#lookup");
    const searchbtn2 = document.querySelector("#lookupcity");
    const searchipt = document.querySelector("#country");

    const makeRequest = async (url) => 
    {
        try {
            const response = await fetch(url);
            if (!response.ok) throw new Error("There was an Error");
            document.querySelector("#result").innerHTML = await response.text();
        } catch (error) {
            document.querySelector("#result").innerHTML = "There was an Error";
            console.error(error);
        }
    };

    const handleClick = (context = "") => (event) => 
    {
        event.preventDefault();
        const url = "world.php?country=" + searchipt.value + (context ? `&context=${context}` : "");
        makeRequest(url);
    };

    searchbtn.addEventListener("click", handleClick());
    searchbtn2.addEventListener("click", handleClick("cities"));
});
