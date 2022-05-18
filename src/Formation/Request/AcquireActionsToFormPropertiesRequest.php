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
use Gs2\Formation\Model\AcquireAction;
use Gs2\Formation\Model\Config;
use Gs2\Formation\Model\AcquireActionConfig;

class AcquireActionsToFormPropertiesRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $moldName;
    /** @var int */
    private $index;
    /** @var AcquireAction */
    private $acquireAction;
    /** @var string */
    private $queueNamespaceId;
    /** @var string */
    private $keyId;
    /** @var array */
    private $config;
    /** @var string */
    private $duplicationAvoider;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): AcquireActionsToFormPropertiesRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): AcquireActionsToFormPropertiesRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getMoldName(): ?string {
		return $this->moldName;
	}

	public function setMoldName(?string $moldName) {
		$this->moldName = $moldName;
	}

	public function withMoldName(?string $moldName): AcquireActionsToFormPropertiesRequest {
		$this->moldName = $moldName;
		return $this;
	}

	public function getIndex(): ?int {
		return $this->index;
	}

	public function setIndex(?int $index) {
		$this->index = $index;
	}

	public function withIndex(?int $index): AcquireActionsToFormPropertiesRequest {
		$this->index = $index;
		return $this;
	}

	public function getAcquireAction(): ?AcquireAction {
		return $this->acquireAction;
	}

	public function setAcquireAction(?AcquireAction $acquireAction) {
		$this->acquireAction = $acquireAction;
	}

	public function withAcquireAction(?AcquireAction $acquireAction): AcquireActionsToFormPropertiesRequest {
		$this->acquireAction = $acquireAction;
		return $this;
	}

	public function getQueueNamespaceId(): ?string {
		return $this->queueNamespaceId;
	}

	public function setQueueNamespaceId(?string $queueNamespaceId) {
		$this->queueNamespaceId = $queueNamespaceId;
	}

	public function withQueueNamespaceId(?string $queueNamespaceId): AcquireActionsToFormPropertiesRequest {
		$this->queueNamespaceId = $queueNamespaceId;
		return $this;
	}

	public function getKeyId(): ?string {
		return $this->keyId;
	}

	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}

	public function withKeyId(?string $keyId): AcquireActionsToFormPropertiesRequest {
		$this->keyId = $keyId;
		return $this;
	}

	public function getConfig(): ?array {
		return $this->config;
	}

	public function setConfig(?array $config) {
		$this->config = $config;
	}

	public function withConfig(?array $config): AcquireActionsToFormPropertiesRequest {
		$this->config = $config;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): AcquireActionsToFormPropertiesRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?AcquireActionsToFormPropertiesRequest {
        if ($data === null) {
            return null;
        }
        return (new AcquireActionsToFormPropertiesRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withMoldName(array_key_exists('moldName', $data) && $data['moldName'] !== null ? $data['moldName'] : null)
            ->withIndex(array_key_exists('index', $data) && $data['index'] !== null ? $data['index'] : null)
            ->withAcquireAction(array_key_exists('acquireAction', $data) && $data['acquireAction'] !== null ? AcquireAction::fromJson($data['acquireAction']) : null)
            ->withQueueNamespaceId(array_key_exists('queueNamespaceId', $data) && $data['queueNamespaceId'] !== null ? $data['queueNamespaceId'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null)
            ->withConfig(array_map(
                function ($item) {
                    return AcquireActionConfig::fromJson($item);
                },
                array_key_exists('config', $data) && $data['config'] !== null ? $data['config'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "moldName" => $this->getMoldName(),
            "index" => $this->getIndex(),
            "acquireAction" => $this->getAcquireAction() !== null ? $this->getAcquireAction()->toJson() : null,
            "queueNamespaceId" => $this->getQueueNamespaceId(),
            "keyId" => $this->getKeyId(),
            "config" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig() !== null && $this->getConfig() !== null ? $this->getConfig() : []
            ),
        );
    }
}