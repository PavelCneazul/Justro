import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {RouterModule, Routes} from "@angular/router";
import {LoginComponent} from "./components/login/login.component";
import {SingupComponent} from "./components/singup/singup.component";
import {ProfileComponent} from "./components/profile/profile.component";
import {RequestResetComponent} from "./components/password/request-reset/request-reset.component";
import {ResponseResetComponent} from "./components/password/response-reset/response-reset.component";

const appRoutes:Routes =[
  {
    path: 'login',
    component: LoginComponent,
  },
  {
    path: 'singup',
    component: SingupComponent,
  },
  {
    path: 'profile',
    component: ProfileComponent,
  },
  {
    path: 'request-password-reset',
    component: RequestResetComponent,
  },
  {
      path: 'response-password-reset',
      component: ResponseResetComponent,
    }
    ]


@NgModule({
  declarations: [],
  imports: [
    CommonModule,
      RouterModule.forRoot(appRoutes)
  ]
})
export class AppRoutingModule { }
