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

class AcceptRequestRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $guildModelName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $fromUserId;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): AcceptRequestRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getGuildModelName(): ?string {
		return $this->guildModelName;
	}
	public function setGuildModelName(?string $guildModelName) {
		$this->guildModelName = $guildModelName;
	}
	public function withGuildModelName(?string $guildModelName): AcceptRequestRequest {
		$this->guildModelName = $guildModelName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): AcceptRequestRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getFromUserId(): ?string {
		return $this->fromUserId;
	}
	public function setFromUserId(?string $fromUserId) {
		$this->fromUserId = $fromUserId;
	}
	public function withFromUserId(?string $fromUserId): AcceptRequestRequest {
		$this->fromUserId = $fromUserId;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): AcceptRequestRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?AcceptRequestRequest {
        if ($data === null) {
            return null;
        }
        return (new AcceptRequestRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withFromUserId(array_key_exists('fromUserId', $data) && $data['fromUserId'] !== null ? $data['fromUserId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "guildModelName" => $this->getGuildModelName(),
            "accessToken" => $this->getAccessToken(),
            "fromUserId" => $this->getFromUserId(),
        );
    }
}