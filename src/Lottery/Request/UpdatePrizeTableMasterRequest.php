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

namespace Gs2\Lottery\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Lottery\Model\AcquireAction;
use Gs2\Lottery\Model\Prize;

/**
 * Request for updatePrizeTableMaster: Update Prize Table Master
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#updateprizetablemaster
 */
class UpdatePrizeTableMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Prize Table Name */
    private $prizeTableName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var array Prizes */
    private $prizes;
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
     * @return UpdatePrizeTableMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdatePrizeTableMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Prize Table Name */
	public function getPrizeTableName(): ?string {
		return $this->prizeTableName;
	}
    /** @param string|null $prizeTableName Prize Table Name */
	public function setPrizeTableName(?string $prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}
    /**
     * @param string|null $prizeTableName Prize Table Name
     * @return UpdatePrizeTableMasterRequest
     */
	public function withPrizeTableName(?string $prizeTableName): UpdatePrizeTableMasterRequest {
		$this->prizeTableName = $prizeTableName;
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
     * @return UpdatePrizeTableMasterRequest
     */
	public function withDescription(?string $description): UpdatePrizeTableMasterRequest {
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
     * @return UpdatePrizeTableMasterRequest
     */
	public function withMetadata(?string $metadata): UpdatePrizeTableMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null Prizes */
	public function getPrizes(): ?array {
		return $this->prizes;
	}
    /** @param array|null $prizes Prizes */
	public function setPrizes(?array $prizes) {
		$this->prizes = $prizes;
	}
    /**
     * @param array|null $prizes Prizes
     * @return UpdatePrizeTableMasterRequest
     */
	public function withPrizes(?array $prizes): UpdatePrizeTableMasterRequest {
		$this->prizes = $prizes;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdatePrizeTableMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdatePrizeTableMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withPrizeTableName(array_key_exists('prizeTableName', $data) && $data['prizeTableName'] !== null ? $data['prizeTableName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withPrizes(!array_key_exists('prizes', $data) || $data['prizes'] === null ? null : array_map(
                function ($item) {
                    return Prize::fromJson($item);
                },
                $data['prizes']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "prizeTableName" => $this->getPrizeTableName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "prizes" => $this->getPrizes() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getPrizes()
            ),
        );
    }
}