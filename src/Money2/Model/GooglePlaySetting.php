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


class GooglePlaySetting implements IModel {
	/**
     * @var string
	 */
	private $packageName;
	/**
     * @var string
	 */
	private $publicKey;
	/**
     * @var string
	 */
	private $credentialsJSON;
	public function getPackageName(): ?string {
		return $this->packageName;
	}
	public function setPackageName(?string $packageName) {
		$this->packageName = $packageName;
	}
	public function withPackageName(?string $packageName): GooglePlaySetting {
		$this->packageName = $packageName;
		return $this;
	}
	public function getPublicKey(): ?string {
		return $this->publicKey;
	}
	public function setPublicKey(?string $publicKey) {
		$this->publicKey = $publicKey;
	}
	public function withPublicKey(?string $publicKey): GooglePlaySetting {
		$this->publicKey = $publicKey;
		return $this;
	}
	public function getCredentialsJSON(): ?string {
		return $this->credentialsJSON;
	}
	public function setCredentialsJSON(?string $credentialsJSON) {
		$this->credentialsJSON = $credentialsJSON;
	}
	public function withCredentialsJSON(?string $credentialsJSON): GooglePlaySetting {
		$this->credentialsJSON = $credentialsJSON;
		return $this;
	}

    public static function fromJson(?array $data): ?GooglePlaySetting {
        if ($data === null) {
            return null;
        }
        return (new GooglePlaySetting())
            ->withPackageName(array_key_exists('packageName', $data) && $data['packageName'] !== null ? $data['packageName'] : null)
            ->withPublicKey(array_key_exists('publicKey', $data) && $data['publicKey'] !== null ? $data['publicKey'] : null)
            ->withCredentialsJSON(array_key_exists('credentialsJSON', $data) && $data['credentialsJSON'] !== null ? $data['credentialsJSON'] : null);
    }

    public function toJson(): array {
        return array(
            "packageName" => $this->getPackageName(),
            "publicKey" => $this->getPublicKey(),
            "credentialsJSON" => $this->getCredentialsJSON(),
        );
    }
}