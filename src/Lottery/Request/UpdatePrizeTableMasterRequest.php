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

class UpdatePrizeTableMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $prizeTableName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var array */
    private $prizes;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdatePrizeTableMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getPrizeTableName(): ?string {
		return $this->prizeTableName;
	}
	public function setPrizeTableName(?string $prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}
	public function withPrizeTableName(?string $prizeTableName): UpdatePrizeTableMasterRequest {
		$this->prizeTableName = $prizeTableName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdatePrizeTableMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UpdatePrizeTableMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getPrizes(): ?array {
		return $this->prizes;
	}
	public function setPrizes(?array $prizes) {
		$this->prizes = $prizes;
	}
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