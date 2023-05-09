import {Component, Input, OnInit} from '@angular/core';
import {GithubUsersService} from "../../services/github-users.service";

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.css']
})
export class ListComponent implements OnInit{
  @Input()
  tableHeaders!: string[]

  @Input()
  items!: Array<any>

  @Input()
  completeItems!: Array<any>

  @Input()
  showActionsButton: boolean = false

  showModal = false

  @Input()
  actionButtonsState: Array<any> = []

  isTableLoading = false

  isLoading = false

  resultedGithubser: any = undefined

  currentLocationInfo = { location_lat: 0, location_long: 0};

  @Input()
  callbackFunction!: () => void;

  constructor(private $githubUserService: GithubUsersService){

  }


  onSaveGithubUser(): void {
    this.isLoading = true
    this.$githubUserService.handleGithubUserCreation(this.resultedGithubser).subscribe(
      (response) => {

        console.log(response)

        this.isLoading = false
        this.toggleModal();
      },
      err => {
        console.log(err)
        this.isLoading = false;
      }
    )
  }
  onEditGithubUser(): void {
    this.isLoading = true
    this.$githubUserService.handleGithubUserUpdate(this.resultedGithubser.id, this.resultedGithubser).subscribe(
      (response) => {

        console.log(response)
        window.location.reload();
        this.isLoading = false
        this.toggleModal();
      },
      err => {
        console.log(err)
        this.isLoading = false;
      }
    )
  }

  onDeleteGithubUser(id: any, index: any): void {
    this.actionButtonsState[index].showLoading = true;
    this.$githubUserService.handleGithubUserDelete(id).subscribe(
      (response) => {

        console.log(response)

        this.isTableLoading = false

        window.location.reload();
      },
      err => {
        console.log(err)
        this.isTableLoading = false;
      }
    )
  }

  toggleModal() {
    this.showModal = !this.showModal;
  }
  handleModal(item: any) {
    this.resultedGithubser = item
    this.currentLocationInfo = {
      location_lat: item.location_lat,
      location_long: item.location_long
    }
    this.toggleModal();
  }

  protected readonly console = console;

  ngOnInit(): void {


    console.log(this.actionButtonsState)
  }
}
