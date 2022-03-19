import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import {HttpClientModule} from "@angular/common/http";
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import {FormsModule} from "@angular/forms";
import {NgSelectModule} from "@ng-select/ng-select";
import {NgxUiLoaderModule} from "ngx-ui-loader";

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    NgSelectModule, // This is for material ng-select
    BrowserModule,
    HttpClientModule,
    NgbModule,
    FormsModule,
    NgxUiLoaderModule // This is reuqired for loading
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
