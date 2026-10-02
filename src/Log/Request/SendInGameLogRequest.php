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

namespace Gs2\Log\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Log\Model\InGameLogTag;

/**
 * Request for sendInGameLog: Send in-game log
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#sendingamelog
 */
class SendInGameLogRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var array Tags */
    private $tags;
    /** @var string Payload */
    private $payload;
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
     * @return SendInGameLogRequest
     */
	public function withNamespaceName(?string $namespaceName): SendInGameLogRequest {
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
     * @return SendInGameLogRequest
     */
	public function withAccessToken(?string $accessToken): SendInGameLogRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return array|null Tags */
	public function getTags(): ?array {
		return $this->tags;
	}
    /** @param array|null $tags Tags */
	public function setTags(?array $tags) {
		$this->tags = $tags;
	}
    /**
     * @param array|null $tags Tags
     * @return SendInGameLogRequest
     */
	public function withTags(?array $tags): SendInGameLogRequest {
		$this->tags = $tags;
		return $this;
	}
    /** @return string|null Payload */
	public function getPayload(): ?string {
		return $this->payload;
	}
    /** @param string|null $payload Payload */
	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}
    /**
     * @param string|null $payload Payload
     * @return SendInGameLogRequest
     */
	public function withPayload(?string $payload): SendInGameLogRequest {
		$this->payload = $payload;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SendInGameLogRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SendInGameLogRequest {
        if ($data === null) {
            return null;
        }
        return (new SendInGameLogRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withTags(!array_key_exists('tags', $data) || $data['tags'] === null ? null : array_map(
                function ($item) {
                    return InGameLogTag::fromJson($item);
                },
                $data['tags']
            ))
            ->withPayload(array_key_exists('payload', $data) && $data['payload'] !== null ? $data['payload'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "tags" => $this->getTags() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getTags()
            ),
            "payload" => $this->getPayload(),
        );
    }
}