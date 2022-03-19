import {Component, OnInit} from '@angular/core';
import {FilterResponseModel} from "./response/filter-response.model";
import {CountryResponseModel} from "./response/country-response.model";
import {CountryService} from "./services/country.service";
import {FilterModel} from "./models/filter.model";
import {HomeData} from "./ui-data/home.data";
import {NgxUiLoaderService} from "ngx-ui-loader";

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit{
  /**
   * Required Data for home directory
   */
  homeData: HomeData = new HomeData();

  /**
   * inject needed dependencies for component
   */
  constructor(
    private countryService: CountryService,
    private ngxLoader: NgxUiLoaderService
  ){}

  /**
   * calling the needed apis for getting the component data
   */
  ngOnInit(): void{
    this.countryService.getFilters().subscribe((data: FilterResponseModel) => {
        this.homeData.filters = data.data;
    })

    this.getCustomers();
  }

  /**
   * get customer data with passing filter arguments if any
   */
  getCustomers(page: number = 1){
    this.ngxLoader.start();
    this.countryService.getCountries(page, this.homeData.selectedCountry, this.homeData.selectedState)
      .subscribe((data: CountryResponseModel) => {
        this.homeData.countriesData = data;
    })
    this.ngxLoader.stop();
  }

}

