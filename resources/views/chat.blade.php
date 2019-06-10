@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
        <div class="col-12">
          <button type="button" class="btn btn-danger btn-block btn-lg chatBtn" data-toggle="modal" data-target="#reply">
            Scrivi un messaggio
          </button>

          <!-- Modal -->
          <div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="REplyModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="{{ route('send-chat-message', $report->id) }}" method="post">
                  @csrf
                  <input type="hidden" name="report_id" value="{{ $report->id }}">
                  <div class="modal-header">
                    <h5 class="modal-title" id="REplyModal">Scrivi un messaggio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <textarea name="message" class="form-control" rows="8"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary chatBtn" data-dismiss="modal">Chiudi</button>
                    <button type="submit" class="btn btn-primary  chatBtn">Invia</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @if ($report->messages->isNotEmpty())
    <div class="container mt-5">
      @foreach ($report->messages as $message)
        <div class="row d-flex mb-4">
          @if ($message->sender_id == $report->user_id)
            <div class="col-4 mr-auto">
              <div class="card text-dark">
                <div class="card-body p-2 chatReceive">
                  <p>{{ $message->message }}</p>
                  <p class="text-right mb-0"><small>{{ $message->created_at }}</small></p>
                </div>
              </div>
            </div>
          @else
            <div class="col-4 ml-auto">
              <div class="card">
                <div class="card-body p-2 chatSend">
                  <p>{{ $message->message }}</p>
                  <p class="text-right mb-0"><small>{{ $message->created_at }}</small></p>
                </div>
              </div>
            </div>
          @endif
        </div>
      @endforeach
    </div>
  @endif
@endsection
