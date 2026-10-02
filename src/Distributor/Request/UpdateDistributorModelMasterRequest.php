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

/**
 * Request for updateDistributorModelMaster: Update Distributor Model Master
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#updatedistributormodelmaster
 */
class UpdateDistributorModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Distributor Model name */
    private $distributorName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var string GS2-Inbox Namespace GRN to transfer overflow resources */
    private $inboxNamespaceId;
    /** @var array Whitelist of target resource GRN prefixes that can be processed through GS2-Distributor */
    private $whiteListTargetIds;
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
     * @return UpdateDistributorModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateDistributorModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Distributor Model name */
	public function getDistributorName(): ?string {
		return $this->distributorName;
	}
    /** @param string|null $distributorName Distributor Model name */
	public function setDistributorName(?string $distributorName) {
		$this->distributorName = $distributorName;
	}
    /**
     * @param string|null $distributorName Distributor Model name
     * @return UpdateDistributorModelMasterRequest
     */
	public function withDistributorName(?string $distributorName): UpdateDistributorModelMasterRequest {
		$this->distributorName = $distributorName;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return UpdateDistributorModelMasterRequest
     */
	public function withDescription(?string $description): UpdateDistributorModelMasterRequest {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return UpdateDistributorModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateDistributorModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null GS2-Inbox Namespace GRN to transfer overflow resources */
	public function getInboxNamespaceId(): ?string {
		return $this->inboxNamespaceId;
	}
    /** @param string|null $inboxNamespaceId GS2-Inbox Namespace GRN to transfer overflow resources */
	public function setInboxNamespaceId(?string $inboxNamespaceId) {
		$this->inboxNamespaceId = $inboxNamespaceId;
	}
    /**
     * @param string|null $inboxNamespaceId GS2-Inbox Namespace GRN to transfer overflow resources
     * @return UpdateDistributorModelMasterRequest
     */
	public function withInboxNamespaceId(?string $inboxNamespaceId): UpdateDistributorModelMasterRequest {
		$this->inboxNamespaceId = $inboxNamespaceId;
		return $this;
	}
    /** @return array|null Whitelist of target resource GRN prefixes that can be processed through GS2-Distributor */
	public function getWhiteListTargetIds(): ?array {
		return $this->whiteListTargetIds;
	}
    /** @param array|null $whiteListTargetIds Whitelist of target resource GRN prefixes that can be processed through GS2-Distributor */
	public function setWhiteListTargetIds(?array $whiteListTargetIds) {
		$this->whiteListTargetIds = $whiteListTargetIds;
	}
    /**
     * @param array|null $whiteListTargetIds Whitelist of target resource GRN prefixes that can be processed through GS2-Distributor
     * @return UpdateDistributorModelMasterRequest
     */
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
            ->withWhiteListTargetIds(!array_key_exists('whiteListTargetIds', $data) || $data['whiteListTargetIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['whiteListTargetIds']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "distributorName" => $this->getDistributorName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "inboxNamespaceId" => $this->getInboxNamespaceId(),
            "whiteListTargetIds" => $this->getWhiteListTargetIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getWhiteListTargetIds()
            ),
        );
    }
}