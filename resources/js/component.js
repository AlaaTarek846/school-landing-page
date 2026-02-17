import Login from "./pages/auth/login.vue";
import homeSlider from "./pages/admin/homeSlider/index.vue";
import oneAbout from "./pages/admin/oneAbout/index.vue";
import setting from "./pages/admin/setting/index.vue";
import teams from "./pages/admin/teams/index.vue";
import testimonials from "./pages/admin/testimonials/index.vue";
import Dashboard from "./pages/admin/dashboard.vue";
import contactMessage from "./pages/admin/contactMessages/index.vue";
import policies from "./pages/admin/policies/index.vue";
import whyChooseUs from "./pages/admin/whyChooseUs/index.vue";
import educationalStages from "./pages/admin/educationalStages/index.vue";
import classRooms from "./pages/admin/classRooms/index.vue";
import campusTours from "./pages/admin/campusTours/index.vue";
import studentRegistrations from "./pages/admin/studentRegistrations/index.vue";
import campusTourCategories from "./pages/admin/campusTourCategories/index.vue";
import facilities from "./pages/admin/facilities/index.vue";
import facilityDetails from "./pages/admin/facilityDetails/index.vue";


function Components(app) {
    app.component(`login`, Login);
    app.component(`home-slider`, homeSlider);
    app.component(`dashboard`, Dashboard);
    app.component(`one-about`, oneAbout);
    app.component(`setting`, setting);
    app.component(`testimonials`, testimonials);
    app.component(`teams`, teams);
    app.component(`contact-messages`, contactMessage);
    app.component(`policies`, policies);

    // School Components
    app.component(`why-choose-us`, whyChooseUs);
    app.component(`educational-stages`, educationalStages);
    app.component(`class-rooms`, classRooms);
    app.component(`campus-tours`, campusTours);
    app.component(`campus-tour-categories-component`, campusTourCategories);
    app.component(`facilities`, facilities);
    app.component(`facility-details`, facilityDetails);
    app.component(`student-registrations`, studentRegistrations);
}


export default Components;