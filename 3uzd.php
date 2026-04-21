
<script>

    const pets = [
        {name:"suns1", species:"dog", age:40},
        {name:"suns2", species:"dog", age:5},
        {name:"suns3", species:"dog", age:4},
        {name:"kakis4", species:"cat", age:24},
        {name:"suns4", species:"dog", age:14}
    ];

const dogs = pets.filter(pet => pet.species === "dog");

const list = document.querySelector("#list");

dogs.forEach(dog => {
    const p = document.createElement("p");
    p.textContent = `${dog.name} - ${dog.species} - ${dog.age} gadi`;
    list.appendChild(p);
});

document.querySelector("#count").textContent =
"Kopā suņi: " + dogs.length;
</script>