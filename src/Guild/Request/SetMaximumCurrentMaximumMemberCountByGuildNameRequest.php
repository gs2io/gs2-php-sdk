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
 * Request for setMaximumCurrentMaximumMemberCountByGuildName: Set the maximum number of guild members by specifying a Guild name
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#setmaximumcurrentmaximummembercountbyguildname
 */
class SetMaximumCurrentMaximumMemberCountByGuildNameRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Guild name */
    private $guildName;
    /** @var string Guild Model name */
    private $guildModelName;
    /** @var int Set the maximum number of members */
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
     * @return SetMaximumCurrentMaximumMemberCountByGuildNameRequest
     */
	public function withNamespaceName(?string $namespaceName): SetMaximumCurrentMaximumMemberCountByGuildNameRequest {
		$this->namespaceName = $namespaceName;
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
     * @return SetMaximumCurrentMaximumMemberCountByGuildNameRequest
     */
	public function withGuildName(?string $guildName): SetMaximumCurrentMaximumMemberCountByGuildNameRequest {
		$this->guildName = $guildName;
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
     * @return SetMaximumCurrentMaximumMemberCountByGuildNameRequest
     */
	public function withGuildModelName(?string $guildModelName): SetMaximumCurrentMaximumMemberCountByGuildNameRequest {
		$this->guildModelName = $guildModelName;
		return $this;
	}
    /** @return int|null Set the maximum number of members */
	public function getValue(): ?int {
		return $this->value;
	}
    /** @param int|null $value Set the maximum number of members */
	public function setValue(?int $value) {
		$this->value = $value;
	}
    /**
     * @param int|null $value Set the maximum number of members
     * @return SetMaximumCurrentMaximumMemberCountByGuildNameRequest
     */
	public function withValue(?int $value): SetMaximumCurrentMaximumMemberCountByGuildNameRequest {
		$this->value = $value;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SetMaximumCurrentMaximumMemberCountByGuildNameRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SetMaximumCurrentMaximumMemberCountByGuildNameRequest {
        if ($data === null) {
            return null;
        }
        return (new SetMaximumCurrentMaximumMemberCountByGuildNameRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGuildName(array_key_exists('guildName', $data) && $data['guildName'] !== null ? $data['guildName'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "guildName" => $this->getGuildName(),
            "guildModelName" => $this->getGuildModelName(),
            "value" => $this->getValue(),
        );
    }
}