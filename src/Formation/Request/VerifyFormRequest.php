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

/**
 * Request for verifyForm: Verify a form
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#verifyform
 */
class VerifyFormRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Form Storage Area Model name */
    private $moldModelName;
    /** @var int Index of form */
    private $index;
    /** @var string Name of the slot to count. If omitted, every slot is counted */
    private $slotName;
    /** @var string Regular expression matched against the property ID of each slot */
    private $propertyIdRegex;
    /** @var string What to count */
    private $countType;
    /** @var string Type of verification */
    private $verifyType;
    /** @var int Value to compare with the number of counted slots */
    private $count;
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
     * @return VerifyFormRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyFormRequest {
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
     * @return VerifyFormRequest
     */
	public function withAccessToken(?string $accessToken): VerifyFormRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Form Storage Area Model name */
	public function getMoldModelName(): ?string {
		return $this->moldModelName;
	}
    /** @param string|null $moldModelName Form Storage Area Model name */
	public function setMoldModelName(?string $moldModelName) {
		$this->moldModelName = $moldModelName;
	}
    /**
     * @param string|null $moldModelName Form Storage Area Model name
     * @return VerifyFormRequest
     */
	public function withMoldModelName(?string $moldModelName): VerifyFormRequest {
		$this->moldModelName = $moldModelName;
		return $this;
	}
    /** @return int|null Index of form */
	public function getIndex(): ?int {
		return $this->index;
	}
    /** @param int|null $index Index of form */
	public function setIndex(?int $index) {
		$this->index = $index;
	}
    /**
     * @param int|null $index Index of form
     * @return VerifyFormRequest
     */
	public function withIndex(?int $index): VerifyFormRequest {
		$this->index = $index;
		return $this;
	}
    /** @return string|null Name of the slot to count. If omitted, every slot is counted */
	public function getSlotName(): ?string {
		return $this->slotName;
	}
    /** @param string|null $slotName Name of the slot to count. If omitted, every slot is counted */
	public function setSlotName(?string $slotName) {
		$this->slotName = $slotName;
	}
    /**
     * @param string|null $slotName Name of the slot to count. If omitted, every slot is counted
     * @return VerifyFormRequest
     */
	public function withSlotName(?string $slotName): VerifyFormRequest {
		$this->slotName = $slotName;
		return $this;
	}
    /** @return string|null Regular expression matched against the property ID of each slot */
	public function getPropertyIdRegex(): ?string {
		return $this->propertyIdRegex;
	}
    /** @param string|null $propertyIdRegex Regular expression matched against the property ID of each slot */
	public function setPropertyIdRegex(?string $propertyIdRegex) {
		$this->propertyIdRegex = $propertyIdRegex;
	}
    /**
     * @param string|null $propertyIdRegex Regular expression matched against the property ID of each slot
     * @return VerifyFormRequest
     */
	public function withPropertyIdRegex(?string $propertyIdRegex): VerifyFormRequest {
		$this->propertyIdRegex = $propertyIdRegex;
		return $this;
	}
    /** @return string|null What to count */
	public function getCountType(): ?string {
		return $this->countType;
	}
    /** @param string|null $countType What to count */
	public function setCountType(?string $countType) {
		$this->countType = $countType;
	}
    /**
     * @param string|null $countType What to count
     * @return VerifyFormRequest
     */
	public function withCountType(?string $countType): VerifyFormRequest {
		$this->countType = $countType;
		return $this;
	}
    /** @return string|null Type of verification */
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
    /** @param string|null $verifyType Type of verification */
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
    /**
     * @param string|null $verifyType Type of verification
     * @return VerifyFormRequest
     */
	public function withVerifyType(?string $verifyType): VerifyFormRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
    /** @return int|null Value to compare with the number of counted slots */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Value to compare with the number of counted slots */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Value to compare with the number of counted slots
     * @return VerifyFormRequest
     */
	public function withCount(?int $count): VerifyFormRequest {
		$this->count = $count;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyFormRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyFormRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyFormRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withMoldModelName(array_key_exists('moldModelName', $data) && $data['moldModelName'] !== null ? $data['moldModelName'] : null)
            ->withIndex(array_key_exists('index', $data) && $data['index'] !== null ? $data['index'] : null)
            ->withSlotName(array_key_exists('slotName', $data) && $data['slotName'] !== null ? $data['slotName'] : null)
            ->withPropertyIdRegex(array_key_exists('propertyIdRegex', $data) && $data['propertyIdRegex'] !== null ? $data['propertyIdRegex'] : null)
            ->withCountType(array_key_exists('countType', $data) && $data['countType'] !== null ? $data['countType'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "moldModelName" => $this->getMoldModelName(),
            "index" => $this->getIndex(),
            "slotName" => $this->getSlotName(),
            "propertyIdRegex" => $this->getPropertyIdRegex(),
            "countType" => $this->getCountType(),
            "verifyType" => $this->getVerifyType(),
            "count" => $this->getCount(),
        );
    }
}