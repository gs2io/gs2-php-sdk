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
use Gs2\Inbox\Model\AcquireAction;
use Gs2\Inbox\Model\TimeSpan;

class CreateGlobalMessageMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
    /** @var string */
    private $metadata;
    /** @var array */
    private $readAcquireActions;
    /** @var TimeSpan */
    private $expiresTimeSpan;
    /** @var int */
    private $expiresAt;
    /** @var string */
    private $messageReceptionPeriodEventId;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CreateGlobalMessageMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): CreateGlobalMessageMasterRequest {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): CreateGlobalMessageMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getReadAcquireActions(): ?array {
		return $this->readAcquireActions;
	}
	public function setReadAcquireActions(?array $readAcquireActions) {
		$this->readAcquireActions = $readAcquireActions;
	}
	public function withReadAcquireActions(?array $readAcquireActions): CreateGlobalMessageMasterRequest {
		$this->readAcquireActions = $readAcquireActions;
		return $this;
	}
	public function getExpiresTimeSpan(): ?TimeSpan {
		return $this->expiresTimeSpan;
	}
	public function setExpiresTimeSpan(?TimeSpan $expiresTimeSpan) {
		$this->expiresTimeSpan = $expiresTimeSpan;
	}
	public function withExpiresTimeSpan(?TimeSpan $expiresTimeSpan): CreateGlobalMessageMasterRequest {
		$this->expiresTimeSpan = $expiresTimeSpan;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}
    /**
     * @deprecated
     */
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}
    /**
     * @deprecated
     */
	public function withExpiresAt(?int $expiresAt): CreateGlobalMessageMasterRequest {
		$this->expiresAt = $expiresAt;
		return $this;
	}
	public function getMessageReceptionPeriodEventId(): ?string {
		return $this->messageReceptionPeriodEventId;
	}
	public function setMessageReceptionPeriodEventId(?string $messageReceptionPeriodEventId) {
		$this->messageReceptionPeriodEventId = $messageReceptionPeriodEventId;
	}
	public function withMessageReceptionPeriodEventId(?string $messageReceptionPeriodEventId): CreateGlobalMessageMasterRequest {
		$this->messageReceptionPeriodEventId = $messageReceptionPeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateGlobalMessageMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateGlobalMessageMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withReadAcquireActions(!array_key_exists('readAcquireActions', $data) || $data['readAcquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['readAcquireActions']
            ))
            ->withExpiresTimeSpan(array_key_exists('expiresTimeSpan', $data) && $data['expiresTimeSpan'] !== null ? TimeSpan::fromJson($data['expiresTimeSpan']) : null)
            ->withExpiresAt(array_key_exists('expiresAt', $data) && $data['expiresAt'] !== null ? $data['expiresAt'] : null)
            ->withMessageReceptionPeriodEventId(array_key_exists('messageReceptionPeriodEventId', $data) && $data['messageReceptionPeriodEventId'] !== null ? $data['messageReceptionPeriodEventId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "readAcquireActions" => $this->getReadAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getReadAcquireActions()
            ),
            "expiresTimeSpan" => $this->getExpiresTimeSpan() !== null ? $this->getExpiresTimeSpan()->toJson() : null,
            "expiresAt" => $this->getExpiresAt(),
            "messageReceptionPeriodEventId" => $this->getMessageReceptionPeriodEventId(),
        );
    }
}