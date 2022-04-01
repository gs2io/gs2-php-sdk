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

class UpdateDistributorModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $distributorName;
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

	public function withNamespaceName(?string $namespaceName): UpdateDistributorModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getDistributorName(): ?string {
		return $this->distributorName;
	}

	public function setDistributorName(?string $distributorName) {
		$this->distributorName = $distributorName;
	}

	public function withDistributorName(?string $distributorName): UpdateDistributorModelMasterRequest {
		$this->distributorName = $distributorName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateDistributorModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): UpdateDistributorModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getInboxNamespaceId(): ?string {
		return $this->inboxNamespaceId;
	}

	public function setInboxNamespaceId(?string $inboxNamespaceId) {
		$this->inboxNamespaceId = $inboxNamespaceId;
	}

	public function withInboxNamespaceId(?string $inboxNamespaceId): UpdateDistributorModelMasterRequest {
		$this->inboxNamespaceId = $inboxNamespaceId;
		return $this;
	}

	public function getWhiteListTargetIds(): ?array {
		return $this->whiteListTargetIds;
	}

	public function setWhiteListTargetIds(?array $whiteListTargetIds) {
		$this->whiteListTargetIds = $whiteListTargetIds;
	}

	public function withWhiteListTargetIds(?array $whiteListTargetIds): UpdateDistributorModelMasterRequest {
		$this->whiteListTargetIds = $whiteListTargetIds;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateDistributorModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateDistributorModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDistributorName(array_key_exists('distributorName', $data) && $data['distributorName'] !== null ? $data['distributorName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withInboxNamespaceId(array_key_exists('inboxNamespaceId', $data) && $data['inboxNamespaceId'] !== null ? $data['inboxNamespaceId'] : null)
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
            "distributorName" => $this->getDistributorName(),
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