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
use Gs2\Formation\Model\SlotWithSignature;

/**
 * Request for setPropertyFormWithSignature: Update Property Form with signed slots
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#setpropertyformwithsignature
 */
class SetPropertyFormWithSignatureRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Property Form Model name */
    private $propertyFormModelName;
    /** @var string Property ID */
    private $propertyId;
    /** @var array List of Slot */
    private $slots;
    /** @var string Encryption Key GRN */
    private $keyId;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return SetPropertyFormWithSignatureRequest
     */
	public function withNamespaceName(?string $namespaceName): SetPropertyFormWithSignatureRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return SetPropertyFormWithSignatureRequest
     */
	public function withAccessToken(?string $accessToken): SetPropertyFormWithSignatureRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Property Form Model name */
	public function getPropertyFormModelName(): ?string {
		return $this->propertyFormModelName;
	}
    /** @param string|null $propertyFormModelName Property Form Model name */
	public function setPropertyFormModelName(?string $propertyFormModelName) {
		$this->propertyFormModelName = $propertyFormModelName;
	}
    /**
     * @param string|null $propertyFormModelName Property Form Model name
     * @return SetPropertyFormWithSignatureRequest
     */
	public function withPropertyFormModelName(?string $propertyFormModelName): SetPropertyFormWithSignatureRequest {
		$this->propertyFormModelName = $propertyFormModelName;
		return $this;
	}
    /** @return string|null Property ID */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID
     * @return SetPropertyFormWithSignatureRequest
     */
	public function withPropertyId(?string $propertyId): SetPropertyFormWithSignatureRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return array|null List of Slot */
	public function getSlots(): ?array {
		return $this->slots;
	}
    /** @param array|null $slots List of Slot */
	public function setSlots(?array $slots) {
		$this->slots = $slots;
	}
    /**
     * @param array|null $slots List of Slot
     * @return SetPropertyFormWithSignatureRequest
     */
	public function withSlots(?array $slots): SetPropertyFormWithSignatureRequest {
		$this->slots = $slots;
		return $this;
	}
    /** @return string|null Encryption Key GRN */
	public function getKeyId(): ?string {
		return $this->keyId;
	}
    /** @param string|null $keyId Encryption Key GRN */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
    /**
     * @param string|null $keyId Encryption Key GRN
     * @return SetPropertyFormWithSignatureRequest
     */
	public function withKeyId(?string $keyId): SetPropertyFormWithSignatureRequest {
		$this->keyId = $keyId;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SetPropertyFormWithSignatureRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SetPropertyFormWithSignatureRequest {
        if ($data === null) {
            return null;
        }
        return (new SetPropertyFormWithSignatureRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withPropertyFormModelName(array_key_exists('propertyFormModelName', $data) && $data['propertyFormModelName'] !== null ? $data['propertyFormModelName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withSlots(!array_key_exists('slots', $data) || $data['slots'] === null ? null : array_map(
                function ($item) {
                    return SlotWithSignature::fromJson($item);
                },
                $data['slots']
            ))
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "propertyFormModelName" => $this->getPropertyFormModelName(),
            "propertyId" => $this->getPropertyId(),
            "slots" => $this->getSlots() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSlots()
            ),
            "keyId" => $this->getKeyId(),
        );
    }
}