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

class GetSendRequestRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $guildModelName;
    /** @var string */
    private $targetGuildName;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetSendRequestRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): GetSendRequestRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getGuildModelName(): ?string {
		return $this->guildModelName;
	}
	public function setGuildModelName(?string $guildModelName) {
		$this->guildModelName = $guildModelName;
	}
	public function withGuildModelName(?string $guildModelName): GetSendRequestRequest {
		$this->guildModelName = $guildModelName;
		return $this;
	}
	public function getTargetGuildName(): ?string {
		return $this->targetGuildName;
	}
	public function setTargetGuildName(?string $targetGuildName) {
		$this->targetGuildName = $targetGuildName;
	}
	public function withTargetGuildName(?string $targetGuildName): GetSendRequestRequest {
		$this->targetGuildName = $targetGuildName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetSendRequestRequest {
        if ($data === null) {
            return null;
        }
        return (new GetSendRequestRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withTargetGuildName(array_key_exists('targetGuildName', $data) && $data['targetGuildName'] !== null ? $data['targetGuildName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "guildModelName" => $this->getGuildModelName(),
            "targetGuildName" => $this->getTargetGuildName(),
        );
    }
}