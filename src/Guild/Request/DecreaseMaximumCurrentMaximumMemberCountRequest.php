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
 * Request for decreaseMaximumCurrentMaximumMemberCount: Decrease the maximum number of members
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#decreasemaximumcurrentmaximummembercount
 */
class DecreaseMaximumCurrentMaximumMemberCountRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Guild Model name */
    private $guildModelName;
    /** @var string Guild name */
    private $accessToken;
    /** @var int Increase the maximum number of members */
    private $value;
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
     * @return DecreaseMaximumCurrentMaximumMemberCountRequest
     */
	public function withNamespaceName(?string $namespaceName): DecreaseMaximumCurrentMaximumMemberCountRequest {
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
     * @return DecreaseMaximumCurrentMaximumMemberCountRequest
     */
	public function withGuildModelName(?string $guildModelName): DecreaseMaximumCurrentMaximumMemberCountRequest {
		$this->guildModelName = $guildModelName;
		return $this;
	}
    /** @return string|null Guild name */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken Guild name */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken Guild name
     * @return DecreaseMaximumCurrentMaximumMemberCountRequest
     */
	public function withAccessToken(?string $accessToken): DecreaseMaximumCurrentMaximumMemberCountRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return int|null Increase the maximum number of members */
	public function getValue(): ?int {
		return $this->value;
	}
    /** @param int|null $value Increase the maximum number of members */
	public function setValue(?int $value) {
		$this->value = $value;
	}
    /**
     * @param int|null $value Increase the maximum number of members
     * @return DecreaseMaximumCurrentMaximumMemberCountRequest
     */
	public function withValue(?int $value): DecreaseMaximumCurrentMaximumMemberCountRequest {
		$this->value = $value;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DecreaseMaximumCurrentMaximumMemberCountRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DecreaseMaximumCurrentMaximumMemberCountRequest {
        if ($data === null) {
            return null;
        }
        return (new DecreaseMaximumCurrentMaximumMemberCountRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "guildModelName" => $this->getGuildModelName(),
            "accessToken" => $this->getAccessToken(),
            "value" => $this->getValue(),
        );
    }
}