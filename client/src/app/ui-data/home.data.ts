import {FilterModel} from "../models/filter.model";
import {CountryResponseModel} from "../response/country-response.model";

/**
 * this is the required data to handle ui
 **/
export class HomeData{
  loading : boolean = false;
  selectedCountry: string = null;
  selectedState: string = null;
  filters: FilterModel;
  countriesData: CountryResponseModel;
}
