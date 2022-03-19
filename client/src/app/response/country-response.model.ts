import {CountryModel} from "../models/country.model";
import {PaginateModel} from "../models/paginate.model";

/**
 * this is the api response for get country with pagination
 **/
export interface CountryResponseModel {
  data: CountryModel[];
  paginate: PaginateModel
}
