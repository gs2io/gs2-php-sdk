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
 * Request for getReceiveRequestByGuildName: Get Received Join Request by specifying a Guild name
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#getreceiverequestbyguildname
 */
class GetReceiveRequestByGuildNameRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Guild Model name */
    private $guildModelName;
    /** @var string Guild name */
    private $guildName;
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
     * @return GetReceiveRequestByGuildNameRequest
     */
	public function withNamespaceName(?string $namespaceName): GetReceiveRequestByGuildNameRequest {
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
     * @return GetReceiveRequestByGuildNameRequest
     */
	public function withGuildModelName(?string $guildModelName): GetReceiveRequestByGuildNameRequest {
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
     * @return GetReceiveRequestByGuildNameRequest
     */
	public function withGuildName(?string $guildName): GetReceiveRequestByGuildNameRequest {
		$this->guildName = $guildName;
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
     * @return GetReceiveRequestByGuildNameRequest
     */
	public function withFromUserId(?string $fromUserId): GetReceiveRequestByGuildNameRequest {
		$this->fromUserId = $fromUserId;
		return $this;
	}

    public static function fromJson(?array $data): ?GetReceiveRequestByGuildNameRequest {
        if ($data === null) {
            return null;
        }
        return (new GetReceiveRequestByGuildNameRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withGuildName(array_key_exists('guildName', $data) && $data['guildName'] !== null ? $data['guildName'] : null)
            ->withFromUserId(array_key_exists('fromUserId', $data) && $data['fromUserId'] !== null ? $data['fromUserId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "guildModelName" => $this->getGuildModelName(),
            "guildName" => $this->getGuildName(),
            "fromUserId" => $this->getFromUserId(),
        );
    }
}