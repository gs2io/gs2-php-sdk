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

namespace Gs2\Distributor\Model;

use Gs2\Core\Model\IModel;


/**
 * Distributor Model
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#distributormodel
 */
class DistributorModel implements IModel {
	/**
     * @var string Distributor Model GRN
	 */
	private $distributorModelId;
	/**
     * @var string Distributor Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string GS2-Inbox Namespace GRN to transfer overflow resources
	 */
	private $inboxNamespaceId;
	/**
     * @var array Whitelist of target resource GRN prefixes that can be processed through GS2-Distributor
	 */
	private $whiteListTargetIds;
    /** @return string|null Distributor Model GRN */
	public function getDistributorModelId(): ?string {
		return $this->distributorModelId;
	}
    /** @param string|null $distributorModelId Distributor Model GRN */
	public function setDistributorModelId(?string $distributorModelId) {
		$this->distributorModelId = $distributorModelId;
	}
    /**
     * @param string|null $distributorModelId Distributor Model GRN
     * @return DistributorModel
     */
	public function withDistributorModelId(?string $distributorModelId): DistributorModel {
		$this->distributorModelId = $distributorModelId;
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
     * @return DistributorModel
     */
	public function withName(?string $name): DistributorModel {
		$this->name = $name;
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
     * @return DistributorModel
     */
	public function withMetadata(?string $metadata): DistributorModel {
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
     * @return DistributorModel
     */
	public function withInboxNamespaceId(?string $inboxNamespaceId): DistributorModel {
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
     * @return DistributorModel
     */
	public function withWhiteListTargetIds(?array $whiteListTargetIds): DistributorModel {
		$this->whiteListTargetIds = $whiteListTargetIds;
		return $this;
	}

    public static function fromJson(?array $data): ?DistributorModel {
        if ($data === null) {
            return null;
        }
        return (new DistributorModel())
            ->withDistributorModelId(array_key_exists('distributorModelId', $data) && $data['distributorModelId'] !== null ? $data['distributorModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
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
            "distributorModelId" => $this->getDistributorModelId(),
            "name" => $this->getName(),
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