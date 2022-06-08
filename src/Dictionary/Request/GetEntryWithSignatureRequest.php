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

namespace Gs2\Dictionary\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class GetEntryWithSignatureRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $entryModelName;
    /** @var string */
    private $keyId;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetEntryWithSignatureRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): GetEntryWithSignatureRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getEntryModelName(): ?string {
		return $this->entryModelName;
	}
	public function setEntryModelName(?string $entryModelName) {
		$this->entryModelName = $entryModelName;
	}
	public function withEntryModelName(?string $entryModelName): GetEntryWithSignatureRequest {
		$this->entryModelName = $entryModelName;
		return $this;
	}
	public function getKeyId(): ?string {
		return $this->keyId;
	}
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
	public function withKeyId(?string $keyId): GetEntryWithSignatureRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?GetEntryWithSignatureRequest {
        if ($data === null) {
            return null;
        }
        return (new GetEntryWithSignatureRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withEntryModelName(array_key_exists('entryModelName', $data) && $data['entryModelName'] !== null ? $data['entryModelName'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "entryModelName" => $this->getEntryModelName(),
            "keyId" => $this->getKeyId(),
        );
    }
}