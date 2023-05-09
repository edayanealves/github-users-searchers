import {Component, OnInit} from '@angular/core';
import {GithubUsersService} from "../../services/github-users.service";

@Component({
  selector: 'app-github-users',
  templateUrl: './github-users.component.html',
  styleUrls: ['./github-users.component.css']
})
export class GithubUsersComponent implements OnInit{

  savedGithubUsers: Array<any> = [];

  actionButtonsState: Array<any> = [];
  listHeaders = [ '#','Username', 'Nome', 'Link do perfil', 'Localização', 'Ações', ]

  constructor(
    private githubUsersService: GithubUsersService,
  ){}
  ngOnInit(): void {
    this.githubUsersService.handleSavedGithubUser().subscribe(
      ({ data }) => {
        console.log(data)
        this.savedGithubUsers = data
        this.actionButtonsState = this.savedGithubUsers.map(() => {
          return {
            showLoading: false,
          }
        })
      },
      err => {
        console.log(err)
      }
    )
  }

  getFormattedSavedGithubUsers() {
    return this.savedGithubUsers.map(user => {
      const { avatar_url, login, name, html_url, location } = user

      return { avatar_url, login, name, html_url, location, action: {text: 'Ver detalhes'} }
    })
  }

  protected readonly undefined = undefined;
}
