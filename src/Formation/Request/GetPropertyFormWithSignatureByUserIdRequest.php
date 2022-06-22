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

class GetPropertyFormWithSignatureByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $formModelName;
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
	public function withNamespaceName(?string $namespaceName): GetPropertyFormWithSignatureByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): GetPropertyFormWithSignatureByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getFormModelName(): ?string {
		return $this->formModelName;
	}
	public function setFormModelName(?string $formModelName) {
		$this->formModelName = $formModelName;
	}
	public function withFormModelName(?string $formModelName): GetPropertyFormWithSignatureByUserIdRequest {
		$this->formModelName = $formModelName;
		return $this;
	}
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
	public function withPropertyId(?string $propertyId): GetPropertyFormWithSignatureByUserIdRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
	public function getKeyId(): ?string {
		return $this->keyId;
	}
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
	public function withKeyId(?string $keyId): GetPropertyFormWithSignatureByUserIdRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?GetPropertyFormWithSignatureByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetPropertyFormWithSignatureByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withFormModelName(array_key_exists('formModelName', $data) && $data['formModelName'] !== null ? $data['formModelName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "formModelName" => $this->getFormModelName(),
            "propertyId" => $this->getPropertyId(),
            "keyId" => $this->getKeyId(),
        );
    }
}