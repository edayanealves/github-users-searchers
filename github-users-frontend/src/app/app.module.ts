import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './pages/login/login.component';
import { RegisterComponent } from './pages/register/register.component';
import { HomeComponent } from './components/home/home.component';

import { authInterceptorProviders } from './helpers/auth.interceptor';
import { NgOptimizedImage } from '@angular/common';
import { MainComponent } from './pages/main/main.component';
import { NavComponent } from './components/nav/nav.component';
import { GithubUsersComponent } from './components/github-users/github-users.component';
import { MapComponent } from './components/map/map.component';
import { LeafletModule } from '@asymmetrik/ngx-leaflet';
import { ListComponent } from './components/list/list.component';
import { CustomButtonComponent } from './components/global/custom-button/custom-button.component';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    RegisterComponent,
    HomeComponent,
    MainComponent,
    NavComponent,
    GithubUsersComponent,
    MapComponent,
    ListComponent,
    CustomButtonComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule,
    NgOptimizedImage,
    LeafletModule
  ],
  providers: [authInterceptorProviders],
  bootstrap: [AppComponent]
})
export class AppModule { }
