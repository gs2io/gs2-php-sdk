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

class UpdateGlobalMessageMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $globalMessageName;
    /** @var string */
    private $metadata;
    /** @var array */
    private $readAcquireActions;
    /** @var TimeSpan */
    private $expiresTimeSpan;
    /** @var int */
    private $expiresAt;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateGlobalMessageMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getGlobalMessageName(): ?string {
		return $this->globalMessageName;
	}

	public function setGlobalMessageName(?string $globalMessageName) {
		$this->globalMessageName = $globalMessageName;
	}

	public function withGlobalMessageName(?string $globalMessageName): UpdateGlobalMessageMasterRequest {
		$this->globalMessageName = $globalMessageName;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): UpdateGlobalMessageMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getReadAcquireActions(): ?array {
		return $this->readAcquireActions;
	}

	public function setReadAcquireActions(?array $readAcquireActions) {
		$this->readAcquireActions = $readAcquireActions;
	}

	public function withReadAcquireActions(?array $readAcquireActions): UpdateGlobalMessageMasterRequest {
		$this->readAcquireActions = $readAcquireActions;
		return $this;
	}

	public function getExpiresTimeSpan(): ?TimeSpan {
		return $this->expiresTimeSpan;
	}

	public function setExpiresTimeSpan(?TimeSpan $expiresTimeSpan) {
		$this->expiresTimeSpan = $expiresTimeSpan;
	}

	public function withExpiresTimeSpan(?TimeSpan $expiresTimeSpan): UpdateGlobalMessageMasterRequest {
		$this->expiresTimeSpan = $expiresTimeSpan;
		return $this;
	}

	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}

	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}

	public function withExpiresAt(?int $expiresAt): UpdateGlobalMessageMasterRequest {
		$this->expiresAt = $expiresAt;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateGlobalMessageMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateGlobalMessageMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGlobalMessageName(array_key_exists('globalMessageName', $data) && $data['globalMessageName'] !== null ? $data['globalMessageName'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withReadAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('readAcquireActions', $data) && $data['readAcquireActions'] !== null ? $data['readAcquireActions'] : []
            ))
            ->withExpiresTimeSpan(array_key_exists('expiresTimeSpan', $data) && $data['expiresTimeSpan'] !== null ? TimeSpan::fromJson($data['expiresTimeSpan']) : null)
            ->withExpiresAt(array_key_exists('expiresAt', $data) && $data['expiresAt'] !== null ? $data['expiresAt'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "globalMessageName" => $this->getGlobalMessageName(),
            "metadata" => $this->getMetadata(),
            "readAcquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getReadAcquireActions() !== null && $this->getReadAcquireActions() !== null ? $this->getReadAcquireActions() : []
            ),
            "expiresTimeSpan" => $this->getExpiresTimeSpan() !== null ? $this->getExpiresTimeSpan()->toJson() : null,
            "expiresAt" => $this->getExpiresAt(),
        );
    }
}