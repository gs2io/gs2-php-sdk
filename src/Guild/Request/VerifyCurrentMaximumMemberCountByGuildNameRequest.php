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

namespace Gs2\Guild\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for verifyCurrentMaximumMemberCountByGuildName: Verify the maximum number of guild members by specifying a Guild name
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#verifycurrentmaximummembercountbyguildname
 */
class VerifyCurrentMaximumMemberCountByGuildNameRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Guild Model name */
    private $guildModelName;
    /** @var string Guild name */
    private $guildName;
    /** @var string Type of verification */
    private $verifyType;
    /** @var int Maximum number of guild members */
    private $value;
    /** @var bool Whether to multiply the value used for verification when specifying the quantity */
    private $multiplyValueSpecifyingQuantity;
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
     * @return VerifyCurrentMaximumMemberCountByGuildNameRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyCurrentMaximumMemberCountByGuildNameRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Guild Model name */
	public function getGuildModelName(): ?string {
		return $this->guildModelName;
	}
    /** @param string|null $guildModelName Guild Model name */
	public function setGuildModelName(?string $guildModelName) {
		$this->guildModelName = $guildModelName;
	}
    /**
     * @param string|null $guildModelName Guild Model name
     * @return VerifyCurrentMaximumMemberCountByGuildNameRequest
     */
	public function withGuildModelName(?string $guildModelName): VerifyCurrentMaximumMemberCountByGuildNameRequest {
		$this->guildModelName = $guildModelName;
		return $this;
	}
    /** @return string|null Guild name */
	public function getGuildName(): ?string {
		return $this->guildName;
	}
    /** @param string|null $guildName Guild name */
	public function setGuildName(?string $guildName) {
		$this->guildName = $guildName;
	}
    /**
     * @param string|null $guildName Guild name
     * @return VerifyCurrentMaximumMemberCountByGuildNameRequest
     */
	public function withGuildName(?string $guildName): VerifyCurrentMaximumMemberCountByGuildNameRequest {
		$this->guildName = $guildName;
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
     * @return VerifyCurrentMaximumMemberCountByGuildNameRequest
     */
	public function withVerifyType(?string $verifyType): VerifyCurrentMaximumMemberCountByGuildNameRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
    /** @return int|null Maximum number of guild members */
	public function getValue(): ?int {
		return $this->value;
	}
    /** @param int|null $value Maximum number of guild members */
	public function setValue(?int $value) {
		$this->value = $value;
	}
    /**
     * @param int|null $value Maximum number of guild members
     * @return VerifyCurrentMaximumMemberCountByGuildNameRequest
     */
	public function withValue(?int $value): VerifyCurrentMaximumMemberCountByGuildNameRequest {
		$this->value = $value;
		return $this;
	}
    /** @return bool|null Whether to multiply the value used for verification when specifying the quantity */
	public function getMultiplyValueSpecifyingQuantity(): ?bool {
		return $this->multiplyValueSpecifyingQuantity;
	}
    /** @param bool|null $multiplyValueSpecifyingQuantity Whether to multiply the value used for verification when specifying the quantity */
	public function setMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity) {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
	}
    /**
     * @param bool|null $multiplyValueSpecifyingQuantity Whether to multiply the value used for verification when specifying the quantity
     * @return VerifyCurrentMaximumMemberCountByGuildNameRequest
     */
	public function withMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity): VerifyCurrentMaximumMemberCountByGuildNameRequest {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyCurrentMaximumMemberCountByGuildNameRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyCurrentMaximumMemberCountByGuildNameRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyCurrentMaximumMemberCountByGuildNameRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withGuildName(array_key_exists('guildName', $data) && $data['guildName'] !== null ? $data['guildName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null)
            ->withMultiplyValueSpecifyingQuantity(array_key_exists('multiplyValueSpecifyingQuantity', $data) ? $data['multiplyValueSpecifyingQuantity'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "guildModelName" => $this->getGuildModelName(),
            "guildName" => $this->getGuildName(),
            "verifyType" => $this->getVerifyType(),
            "value" => $this->getValue(),
            "multiplyValueSpecifyingQuantity" => $this->getMultiplyValueSpecifyingQuantity(),
        );
    }
}