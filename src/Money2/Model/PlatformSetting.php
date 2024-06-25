<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Money2\Model;

use Gs2\Core\Model\IModel;


class PlatformSetting implements IModel {
	/**
     * @var AppleAppStoreSetting
	 */
	private $appleAppStore;
	/**
     * @var GooglePlaySetting
	 */
	private $googlePlay;
	/**
     * @var FakeSetting
	 */
	private $fake;
	public function getAppleAppStore(): ?AppleAppStoreSetting {
		return $this->appleAppStore;
	}
	public function setAppleAppStore(?AppleAppStoreSetting $appleAppStore) {
		$this->appleAppStore = $appleAppStore;
	}
	public function withAppleAppStore(?AppleAppStoreSetting $appleAppStore): PlatformSetting {
		$this->appleAppStore = $appleAppStore;
		return $this;
	}
	public function getGooglePlay(): ?GooglePlaySetting {
		return $this->googlePlay;
	}
	public function setGooglePlay(?GooglePlaySetting $googlePlay) {
		$this->googlePlay = $googlePlay;
	}
	public function withGooglePlay(?GooglePlaySetting $googlePlay): PlatformSetting {
		$this->googlePlay = $googlePlay;
		return $this;
	}
	public function getFake(): ?FakeSetting {
		return $this->fake;
	}
	public function setFake(?FakeSetting $fake) {
		$this->fake = $fake;
	}
	public function withFake(?FakeSetting $fake): PlatformSetting {
		$this->fake = $fake;
		return $this;
	}

    public static function fromJson(?array $data): ?PlatformSetting {
        if ($data === null) {
            return null;
        }
        return (new PlatformSetting())
            ->withAppleAppStore(array_key_exists('appleAppStore', $data) && $data['appleAppStore'] !== null ? AppleAppStoreSetting::fromJson($data['appleAppStore']) : null)
            ->withGooglePlay(array_key_exists('googlePlay', $data) && $data['googlePlay'] !== null ? GooglePlaySetting::fromJson($data['googlePlay']) : null)
            ->withFake(array_key_exists('fake', $data) && $data['fake'] !== null ? FakeSetting::fromJson($data['fake']) : null);
    }

    public function toJson(): array {
        return array(
            "appleAppStore" => $this->getAppleAppStore() !== null ? $this->getAppleAppStore()->toJson() : null,
            "googlePlay" => $this->getGooglePlay() !== null ? $this->getGooglePlay()->toJson() : null,
            "fake" => $this->getFake() !== null ? $this->getFake()->toJson() : null,
        );
    }
}