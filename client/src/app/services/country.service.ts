import {Injectable} from "@angular/core";
import {HttpClient, HttpParams} from "@angular/common/http";
import {CountryResponseModel} from "../response/country-response.model";
import {environment} from "../../environments/environment";
import {Apis} from "../core/apis";
import {Observable} from "rxjs";
import {FilterResponseModel} from "../response/filter-response.model";

/**
 * this is the service which handles api calls
 **/
@Injectable({
  providedIn: 'root'
})
export class CountryService{

  constructor(private http: HttpClient) { }

  /**
   * getCountries method gets the countries and filter the parameters as needed from api
   **/
  getCountries(page: number = 1, country: string = null, state: string = null): Observable<CountryResponseModel>{
    const params = this._getPhoneParameters(page, country, state)

    return this.http.get<CountryResponseModel>(environment.BASE_URL + Apis.GET_PHONES,
      {params: params}
    );
  }

  /**
   * getFilters method gets the required filters
   **/
  getFilters(): Observable<FilterResponseModel>{
    return this.http.get<FilterResponseModel>(environment.BASE_URL + Apis.GET_FILTERS);
  }

  _getPhoneParameters(page: number = 1, country: string = null, state: string = null): HttpParams{
    let params = new HttpParams();

    params = params.append("page", String(page));

    if (country != null){
      params = params.append("country", String(country));
    }

    if (state != null){
      params = params.append("state", String(state));
    }

    return params;
  }
}
