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

namespace Gs2\Lottery\Model;

use Gs2\Core\Model\IModel;


/**
 * Prize Table
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#prizetable
 */
class PrizeTable implements IModel {
	/**
     * @var string Prize Table GRN
	 */
	private $prizeTableId;
	/**
     * @var string Prize Table name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var array Prizes
	 */
	private $prizes;
    /** @return string|null Prize Table GRN */
	public function getPrizeTableId(): ?string {
		return $this->prizeTableId;
	}
    /** @param string|null $prizeTableId Prize Table GRN */
	public function setPrizeTableId(?string $prizeTableId) {
		$this->prizeTableId = $prizeTableId;
	}
    /**
     * @param string|null $prizeTableId Prize Table GRN
     * @return PrizeTable
     */
	public function withPrizeTableId(?string $prizeTableId): PrizeTable {
		$this->prizeTableId = $prizeTableId;
		return $this;
	}
    /** @return string|null Prize Table name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Prize Table name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Prize Table name
     * @return PrizeTable
     */
	public function withName(?string $name): PrizeTable {
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
     * @return PrizeTable
     */
	public function withMetadata(?string $metadata): PrizeTable {
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
     * @return PrizeTable
     */
	public function withPrizes(?array $prizes): PrizeTable {
		$this->prizes = $prizes;
		return $this;
	}

    public static function fromJson(?array $data): ?PrizeTable {
        if ($data === null) {
            return null;
        }
        return (new PrizeTable())
            ->withPrizeTableId(array_key_exists('prizeTableId', $data) && $data['prizeTableId'] !== null ? $data['prizeTableId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
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
            "prizeTableId" => $this->getPrizeTableId(),
            "name" => $this->getName(),
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