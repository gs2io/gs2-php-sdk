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
 * Request for createDistributorModelMaster: Create Distributor Model Master
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#createdistributormodelmaster
 */
class CreateDistributorModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Distributor Model name */
    private $name;
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
     * @return CreateDistributorModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateDistributorModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Distributor Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Distributor Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Distributor Model name
     * @return CreateDistributorModelMasterRequest
     */
	public function withName(?string $name): CreateDistributorModelMasterRequest {
		$this->name = $name;
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
     * @return CreateDistributorModelMasterRequest
     */
	public function withDescription(?string $description): CreateDistributorModelMasterRequest {
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
     * @return CreateDistributorModelMasterRequest
     */
	public function withMetadata(?string $metadata): CreateDistributorModelMasterRequest {
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
     * @return CreateDistributorModelMasterRequest
     */
	public function withInboxNamespaceId(?string $inboxNamespaceId): CreateDistributorModelMasterRequest {
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
     * @return CreateDistributorModelMasterRequest
     */
	public function withWhiteListTargetIds(?array $whiteListTargetIds): CreateDistributorModelMasterRequest {
		$this->whiteListTargetIds = $whiteListTargetIds;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateDistributorModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateDistributorModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
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
            "name" => $this->getName(),
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