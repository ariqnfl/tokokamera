$(document).ready(function () {
    $(".regist-form").hide();

    $("#btn-dont-have").click(function () {
        $(".login-form").fadeOut();
        $(".regist-form").fadeIn("slow");
    });
    $("#btn-have").click(function () {
        $(".regist-form").fadeOut();
        $(".login-form").fadeIn("slow");
    });
});

var vm = new Vue({
    el: '#item',
    data: {
        cart: [],
        item: [
            {
                id: "Cam01",
                title: "A7r III Body Only",
                brand: "Sony",
                category: "Mirrorless",
                desc: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                price: 43000000,
                image: "SONY_a7riii_body_only.jpg",
                stock: 7,
            },
            {
                id: "Cam02",
                title: "X-T3 Body Only",
                brand: "Fujifilm",
                category: "Mirrorless",
                desc: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                price: 36500000,
                image: "Fujifilm_X-T3_body_only.jpg",
                stock: 3,
            },
            {
                id: "Cam03",
                title: "Eos M5 mark VI Body Only",
                brand: "Canon",
                category: "DSLR",
                desc: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                price: 42700000,
                image: "Canon_EOS_5d_mark_iv_body_only.jpg",
                stock: 5,
            },
            {
                id: "Cam04",
                title: "Hero 7 Black",
                brand: "GoPro",
                category: "Compact",
                desc: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                price: 6999000,
                image: "GoPro_Hero_7_Black.jpg",
                stock: 11
            },
            {
                id: "Acc01",
                title: "30mm f1.4 E mount",
                brand: "Sigma",
                category: "Accessories",
                desc: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                price: 7120000,
                image: "Sigma_30mm_f1.4_E_mount.jpg",
                stock: 4
            },
            {
                id: "Acc02",
                title: "VideoMic Pro",
                brand: "Rode",
                category: "Accessories",
                desc: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                price: 1200000,
                image: "Rode_VideoMic_Pro.jpg",
                stock: 9
            }
        ]
    },
});