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

namespace Gs2\Distributor\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class CreateDistributorModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var string */
    private $inboxNamespaceId;
    /** @var array */
    private $whiteListTargetIds;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): CreateDistributorModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): CreateDistributorModelMasterRequest {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): CreateDistributorModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): CreateDistributorModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getInboxNamespaceId(): ?string {
		return $this->inboxNamespaceId;
	}

	public function setInboxNamespaceId(?string $inboxNamespaceId) {
		$this->inboxNamespaceId = $inboxNamespaceId;
	}

	public function withInboxNamespaceId(?string $inboxNamespaceId): CreateDistributorModelMasterRequest {
		$this->inboxNamespaceId = $inboxNamespaceId;
		return $this;
	}

	public function getWhiteListTargetIds(): ?array {
		return $this->whiteListTargetIds;
	}

	public function setWhiteListTargetIds(?array $whiteListTargetIds) {
		$this->whiteListTargetIds = $whiteListTargetIds;
	}

	public function withWhiteListTargetIds(?array $whiteListTargetIds): CreateDistributorModelMasterRequest {
		$this->whiteListTargetIds = $whiteListTargetIds;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateDistributorModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateDistributorModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withInboxNamespaceId(empty($data['inboxNamespaceId']) ? null : $data['inboxNamespaceId'])
            ->withWhiteListTargetIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('whiteListTargetIds', $data) && $data['whiteListTargetIds'] !== null ? $data['whiteListTargetIds'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "inboxNamespaceId" => $this->getInboxNamespaceId(),
            "whiteListTargetIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getWhiteListTargetIds() !== null && $this->getWhiteListTargetIds() !== null ? $this->getWhiteListTargetIds() : []
            ),
        );
    }
}