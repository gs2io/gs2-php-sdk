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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class GetPropertyFormWithSignatureRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $propertyFormModelName;
    /** @var string */
    private $propertyId;
    /** @var string */
    private $keyId;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetPropertyFormWithSignatureRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): GetPropertyFormWithSignatureRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getPropertyFormModelName(): ?string {
		return $this->propertyFormModelName;
	}
	public function setPropertyFormModelName(?string $propertyFormModelName) {
		$this->propertyFormModelName = $propertyFormModelName;
	}
	public function withPropertyFormModelName(?string $propertyFormModelName): GetPropertyFormWithSignatureRequest {
		$this->propertyFormModelName = $propertyFormModelName;
		return $this;
	}
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
	public function withPropertyId(?string $propertyId): GetPropertyFormWithSignatureRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
	public function getKeyId(): ?string {
		return $this->keyId;
	}
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
	public function withKeyId(?string $keyId): GetPropertyFormWithSignatureRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?GetPropertyFormWithSignatureRequest {
        if ($data === null) {
            return null;
        }
        return (new GetPropertyFormWithSignatureRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withPropertyFormModelName(array_key_exists('propertyFormModelName', $data) && $data['propertyFormModelName'] !== null ? $data['propertyFormModelName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "propertyFormModelName" => $this->getPropertyFormModelName(),
            "propertyId" => $this->getPropertyId(),
            "keyId" => $this->getKeyId(),
        );
    }
}