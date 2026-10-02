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

namespace Gs2\Inbox\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Inbox\Model\Config;

/**
 * Request for batchReadMessages: Read messages
 *
 * @see https://docs.gs2.io/api_reference/inbox/sdk/#batchreadmessages
 */
class BatchReadMessagesRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var array List of message names */
    private $messageNames;
    /** @var array Configuration values applied to transaction variables */
    private $config;
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
     * @return BatchReadMessagesRequest
     */
	public function withNamespaceName(?string $namespaceName): BatchReadMessagesRequest {
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
     * @return BatchReadMessagesRequest
     */
	public function withAccessToken(?string $accessToken): BatchReadMessagesRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return array|null List of message names */
	public function getMessageNames(): ?array {
		return $this->messageNames;
	}
    /** @param array|null $messageNames List of message names */
	public function setMessageNames(?array $messageNames) {
		$this->messageNames = $messageNames;
	}
    /**
     * @param array|null $messageNames List of message names
     * @return BatchReadMessagesRequest
     */
	public function withMessageNames(?array $messageNames): BatchReadMessagesRequest {
		$this->messageNames = $messageNames;
		return $this;
	}
    /** @return array|null Configuration values applied to transaction variables */
	public function getConfig(): ?array {
		return $this->config;
	}
    /** @param array|null $config Configuration values applied to transaction variables */
	public function setConfig(?array $config) {
		$this->config = $config;
	}
    /**
     * @param array|null $config Configuration values applied to transaction variables
     * @return BatchReadMessagesRequest
     */
	public function withConfig(?array $config): BatchReadMessagesRequest {
		$this->config = $config;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): BatchReadMessagesRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?BatchReadMessagesRequest {
        if ($data === null) {
            return null;
        }
        return (new BatchReadMessagesRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withMessageNames(!array_key_exists('messageNames', $data) || $data['messageNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['messageNames']
            ))
            ->withConfig(!array_key_exists('config', $data) || $data['config'] === null ? null : array_map(
                function ($item) {
                    return Config::fromJson($item);
                },
                $data['config']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "messageNames" => $this->getMessageNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getMessageNames()
            ),
            "config" => $this->getConfig() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig()
            ),
        );
    }
}