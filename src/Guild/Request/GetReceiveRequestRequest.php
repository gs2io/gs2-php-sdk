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
 * Request for getReceiveRequest: Get Received Join Request
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#getreceiverequest
 */
class GetReceiveRequestRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Guild Model name */
    private $guildModelName;
    /** @var string Guild name */
    private $accessToken;
    /** @var string User ID */
    private $fromUserId;
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
     * @return GetReceiveRequestRequest
     */
	public function withNamespaceName(?string $namespaceName): GetReceiveRequestRequest {
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
     * @return GetReceiveRequestRequest
     */
	public function withGuildModelName(?string $guildModelName): GetReceiveRequestRequest {
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
     * @return GetReceiveRequestRequest
     */
	public function withAccessToken(?string $accessToken): GetReceiveRequestRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null User ID */
	public function getFromUserId(): ?string {
		return $this->fromUserId;
	}
    /** @param string|null $fromUserId User ID */
	public function setFromUserId(?string $fromUserId) {
		$this->fromUserId = $fromUserId;
	}
    /**
     * @param string|null $fromUserId User ID
     * @return GetReceiveRequestRequest
     */
	public function withFromUserId(?string $fromUserId): GetReceiveRequestRequest {
		$this->fromUserId = $fromUserId;
		return $this;
	}

    public static function fromJson(?array $data): ?GetReceiveRequestRequest {
        if ($data === null) {
            return null;
        }
        return (new GetReceiveRequestRequest())
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