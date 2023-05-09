import { Component, OnInit } from '@angular/core';
import { GithubUsersService } from 'src/app/services/github-users.service';
import { NominatimService } from 'src/app/services/nominatim.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit{

  usernameValue:String = '';
  resultedGithubser: any = undefined
  showModal = false
  isLoading = false
  currentLocationInfo = { location_lat: 0, location_long: 0};
  lastSearchedUsers: Array<any> = []
  listHeaders = [ '#','Username', 'Nome', 'Link do perfil', 'Localização', 'Ações', ]

  constructor(
    private githubUsersService: GithubUsersService,
  ){}
  ngOnInit(): void {

  }

  async onSubmit(): Promise<void> {
    this.isLoading = true
    this.githubUsersService.handleGithubUserSearch(this.usernameValue).subscribe(
      async ({ data }) => {
        console.log(data)

        this.resultedGithubser = data

        this.currentLocationInfo = {
          location_lat: data.location_lat,
          location_long: data.location_long
        }

        const user = {...data, ...this.currentLocationInfo}

        this.lastSearchedUsers.push(user)
        this.isLoading = false;
      },
      err => {
        console.log(err)
      }
    )
  }
  toggleModal() {
    this.showModal = !this.showModal;
  }
  getFormattedLastSearched(isForLastUserOnly = false) {
    const lastUsers = this.lastSearchedUsers.map(user => {
      const { avatar_url, login, name, html_url, location } = user

      return { avatar_url, login, name, html_url, location, action: {callback: () => this.toggleModal, text: 'Ver detalhes'} }
    })

    if(isForLastUserOnly) {
      return [lastUsers[lastUsers.length -1]];
    }
    return lastUsers
  }

}
