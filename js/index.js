const moneyEl = document.getElementById("money");
const foodEl = document.getElementById("food");
const clothesEl = document.getElementById("clothes");
const othersEl = document.getElementById("other-items");
const formEl = document.getElementById("donation-form");
const adoptionForm = document.getElementById("adoption-form");
const donationSection = document.getElementById("donation");
const maleEl = document.getElementById("male");
const femaleEl = document.getElementById("female");

let moneyFlag = false;
let foodFlag = false;
let clothesFlag = false;
let otherFlag = false;



let maleFlag = false;
let femaleFlag = false;

const adoptionSection = document.getElementById("adoption")

// MONEY DONATION

moneyEl.addEventListener("click", function () {
    if (moneyFlag == false) {
        let moneyformEl = `
    <form method="POST" action="index.php#donation" id="donationFormEl">
    <div class="moneyClass">
    <lable for="name">Name:</lable><br>
    <input type="text" name="name" id="name" required>
    </div>

    <div class="moneyClass">
    <lable for="upiId">UPI ID:</lable><br>
    <input type="text" name="upiId" id="upiId" required>
    </div>

    <div class="moneyClass">
    <lable for="amount">Amount:</lable><br>
    <input type="number" name="amount" id="amount"  placeholder="in ₹" required>
    </div>

    <button type="submit" name="moneyForm" class="donate-btn">Donate</button>
    </form>`
        formEl.innerHTML = moneyformEl;
        moneyFlag = true;
        foodFlag = false;
        clothesFlag = false;
        otherFlag = false;
    }
    else {
        formEl.innerHTML = "";
        moneyFlag = false;
    }
})



//FOOD DONATION

foodEl.addEventListener("click", function () {
    if (foodFlag == false) {
        let foodFromEl = `
    <form method="POST" id="donationFormEl" action="index.php#donation">
    <div class="foodClass">
    <lable for="name">Name:</lable><br>
    <input type="text" name="name" id="name">
    </div>

    <div class="foodClass">
    <lable for="address">Address:</lable><br>
    <input type="text" name="address" id="Address">
    </div>

    <div class="foodClass">
    Type of donation:<br>

    <input type="checkbox" id="foodType1" name="foodType[]" value="Instant eatable">
    <label for="foodType1">Instant eatable</label>

    <input type="checkbox" id="foodType2" name="foodType[]" value="Drinkables">
    <label for="foodType2">Drinkables</label>

    <input type="checkbox" id="foodType3" name="foodType[]" value="Preserved food">
    <label for="foodType3">Preserved food</label>
    </div>

    <div class="foodClass">
    <lable for="quantity">Qunatity:</lable><br>
    <input type="number" name="quantity" id="quantity">
    </div>


    <button type="submit" name="foodForm" class="donate-btn">Donate</button>
    </form>
    `
        formEl.innerHTML = foodFromEl;
        moneyFlag = false;
        foodFlag = true;
        clothesFlag = false;
        otherFlag = false;
    }
    else {
        formEl.innerHTML = "";
        foodFlag = false;
    }

})


// CLOTHES DONATION
clothesEl.addEventListener("click", function () {
    if (clothesFlag == false) {
        let clothesformEl = `
    <form method="POST" id="donationFormEl" action="index.php#donation">
        <div class="clothClass">
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name">
        </div>

        <div class="clothClass">
        Donation of clothes for:<br>

        <input type="checkbox" id="clothesType1" name="clothesType[]" value="male">
        <label for="clothesType1">Male</label>

        <input type="checkbox" id="clothesType2" name="clothesType[]" value="female">
        <label for="clothesType2">Female</label>
        </div>
        <button type="submit" name="clothesForm" class="donate-btn">Donate</button>
    </form>
        `
        formEl.innerHTML = clothesformEl;
        moneyFlag = false;
        foodFlag = false;
        clothesFlag = true;
        otherFlag = false;
    }
    else {
        formEl.innerHTML = "";
        clothesFlag = false;
    }


})

// OTHER ITEMS DONATE

othersEl.addEventListener("click", function () {
    if (otherFlag == false) {
        let otherformEl = `
        <form method="POST" id="donationFormEl" action="index.php#donation">
        <div class="otherItemClass">
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name">
        </div>
        <div class="otherItemClass">
        <lable for="itemType">Type:</lable><br>
        <input type="text" name="itemType" id="itemType">
        </div>

        <div class="otherItemClass">
        <lable for="itemDescription">Description:</lable><br>
        <textarea id="itemDescription" name="itemDescription" cols="100" rows="10" placeholder="Description about the type of Object" ></textarea><br>
        </div>

        <button type="submit" name="othersForm" class="donate-btn">Donate</button>

        </form>
        `
        formEl.innerHTML = otherformEl;
        moneyFlag = false;
        foodFlag = false;
        clothesFlag = false;
        otherFlag = true;
    }
    else {
        formEl.innerHTML = "";
        otherFlag = false;
    }

})

// Male Adoption

maleEl.addEventListener("click", function () {
    if (maleFlag == false) {
        let maleFormEl = `
        <form method="POST" id="adoptionFormEl" action="index.php#adoption">
            <div class="maleAdoptClass">
            <p>AGE GROUP(MALE):</p>
                <input type="radio" id="infant" name="age" value="infant">
                <label for="infant">0-2 years</label>
                <input type="radio" id="toddler" name="age" value="toddler">
                <label for="toddler">3-5 years</label>
                <input type="radio" id="tweens" name="age" value="tweens">
                <label for="tweens">6-10 years</label>
                <input type="radio" id="teen" name="age" value="teen">
                <label for="teen">11-15 years</label>
            </div>
            <button type="submit" name="maleChildrenForm" class="donate-btn">Submit</button>
        </form>
    `;
        adoptionForm.innerHTML = maleFormEl;
        maleFlag = true;
        femaleFlag = false;
    }
    else {
        adoptionForm.innerHTML = "";
        maleFlag = false;
    }

})

//Female Adoption

femaleEl.addEventListener("click", function () {
    if (femaleFlag == false) {
        let femaleFormEl = `
        <form method="POST" id="adoptionFormEl" action="index.php#adoption">
            <div class="femaleAdoptClass">
                <p>AGE GROUP(FEMALE):</p>
                <input type="radio" id="infant" name="age" value="infant">
                <label for="infant">0-2 years</label>
                <input type="radio" id="toddler" name="age" value="toddler">
                <label for="toddler">3-5 years</label>
                <input type="radio" id="tweens" name="age" value="tweens">
                <label for="tweens">6-10 years</label>
                <input type="radio" id="teen" name="age" value="teen">
                <label for="teen">11-15 years</label>
            </div>
            <button type="submit" name="femaleChildrenForm" class="donate-btn">Submit</button>
        </form>
    `;
        adoptionForm.innerHTML = femaleFormEl;
        femaleFlag = true;
        maleFlag = false;
    }
    else {
        adoptionForm.innerHTML = "";
        femaleFlag = false;
    }

})