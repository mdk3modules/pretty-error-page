@extends('pretty-error-page::layouts.default')

@section('body')
    <div class="pep-error__mascot">
        <svg class="cactus" xmlns="http://www.w3.org/2000/svg" width="260" height="212" viewBox="0 0 260 212">
            <g stroke="#666" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
                <path class="cactus__arm cactus__arm--left" fill="#B7E6C3" stroke-width="3.8"
                      d="M31 161c-11.6 0-21-10.4-21-23V98c0-12.7 9.5-23 21-23s21 10.3 21 23v20h31v43H31z"/>
                <g class="cactus__spikes cactus__spikes--arm-left">
                    <path class="cactus__spike" fill="none" stroke-width="3.8" d="M52 80l-10 9"/>
                    <path class="cactus__spike" fill="none" stroke-width="4" d="M22 71v14"/>
                    <path class="cactus__spike" fill="none" stroke-width="4" d="M2 104h16"/>
                    <path class="cactus__spike" fill="none" stroke-width="4.2" d="M4 131l15-8"/>
                    <path class="cactus__spike" fill="none" stroke-width="4.3" d="M11 156l11-8"/>
                    <path class="cactus__spike" fill="none" stroke-width="4" d="M35 166v-13"/>
                </g>
                <path class="cactus__arm cactus__arm--right" fill="#99CEA5" stroke-width="3"
                      d="M232 128h-54V86h33v-9c0-11.5 9.4-21 21-21 11.5 0 21 9.4 21 21v30c0 11.6-9.4 21-21 21z"/>
                <g class="cactus__spikes cactus__spikes--arm-right">
                    <path class="cactus__spike" fill="none" stroke-width="3.1" d="M208 68l12 6"/>
                    <path class="cactus__spike" fill="none" stroke-width="3" d="M229.5 52v10"/>
                    <path class="cactus__spike" fill="none" stroke-width="3.1" d="M249 57l-7 11"/>
                    <path class="cactus__spike" fill="none" stroke-width="3.3" d="M258 81l-9 7"/>
                    <path class="cactus__spike" fill="none" stroke-width="3.1" d="M254 124l-8-12"/>
                    <path class="cactus__spike" fill="none" stroke-width="3.2" d="M226 134l6-12"/>
                    <path class="cactus__spike" fill="none" stroke-width="3.6" d="M205 135l-1-15"/>
                </g>
            </g>
            <g class="cactus__body">
                <path class="cactus__inner" fill="#B7E6C3"
                      d="M186.4 208.4h-112v-148c0-30.8 25.2-56 56-56s56 25.2 56 56v148z"/>
                <path id="cactus__body-shadow" fill="#99CEA5"
                      d="M130.2 4c-3.5 0-7 .5-10.6 1.2 25.8 5 45.3 28 45.3 55.2V208h21V60.4C186 29.6 161 4 130 4z"/>
                <path id="cactus__outline" fill="none" stroke="#666" stroke-width="4" stroke-linecap="round"
                      stroke-linejoin="round" stroke-miterlimit="10"
                      d="M186.4 208.4h-112v-148c0-30.8 25.2-56 56-56s56 25.2 56 56v148z"/>
                <g class="cactus__spikes cactus__spikes--body" fill="none" stroke="#666" stroke-width="4"
                   stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
                    <path class="cactus__spike" d="M66 195l15 2"/>
                    <path class="cactus__spike" d="M66 173l14 4"/>
                    <path class="cactus__spike" d="M68 64l15-2"/>
                    <path class="cactus__spike" d="M72 37l11 6"/>
                    <path class="cactus__spike" d="M88 16l10 11"/>
                    <path class="cactus__spike" d="M113 2v15"/>
                    <path class="cactus__spike" d="M152 3l-2 14"/>
                    <path class="cactus__spike" d="M182 23l-8 8"/>
                    <path class="cactus__spike" d="M193 65l-13 8"/>
                    <path class="cactus__spike" d="M193 148l-13-6"/>
                </g>
            </g>
            <g id="cactus__face">
                <circle id="cactus__face__eye cactus__face__eye--left" fill="#666" cx="93" cy="100" r="4"/>
                <circle id="cactus__face__eye cactus__face__eye--right" fill="#666" cx="173" cy="100" r="4"/>
                <path id="cactus__face__mouth" fill="none" stroke="#666" stroke-width="4" stroke-linecap="round"
                      stroke-linejoin="round" stroke-miterlimit="10" d="M119 132h22"/>
            </g>
        </svg>
        <div class="pep-error__mascot__accessory">
            <svg class="tumble-weed" xmlns="http://www.w3.org/2000/svg" width="158" height="80" viewBox="0 0 158 80">
                <path class="tumble-weed__ball" fill="none" stroke="#666" stroke-width="4" stroke-miterlimit="10"
                      d="M70 11.6s-20.5-9-35.6-9S2.7 18.2 2 38s7.4 29 35 28.6c27.8-.5 29-23.2 29-32S60.5 13 43.6 14.2s-34 0-36.2 31.6 23.5 31.8 30 32c6.5.2 48.6-15 44.4-50.8C77.5-8.6 45 3 31.4 7.2S14.6 31.8 14.8 45.7 14.6 73 33.8 72C53.3 71.4 71 55 72 49c1-6.2 1.2-35.3-28.7-33.3S17.8 43 19.3 45c1.5 2 9.4 7.7 17 7s15.4-5.5 14.2-18.2c-.8-6.2-6.5-6.7-9.6-6-6 1-9.5 12.2 2 7.3"/>
                <g fill="none" stroke="#999" stroke-width="3" stroke-linecap="round" stroke-miterlimit="10"
                   stroke-dasharray="2,6">
                    <path class="tumble-weed__wind tumble-weed__wind--short" d="M65 77.5h24"/>
                    <path class="tumble-weed__wind tumble-weed__wind--long"
                          d="M80 64.5h27c6 0 10.5-15.8.5-15.8-11 0-3.4 17.8 3.5 17.8h45"/>
                </g>
            </svg>
        </div>
    </div>
    @parent
@stop
