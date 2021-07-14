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


class PrizeTable implements IModel {
	/**
     * @var string
	 */
	private $prizeTableId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var array
	 */
	private $prizes;

	public function getPrizeTableId(): ?string {
		return $this->prizeTableId;
	}

	public function setPrizeTableId(?string $prizeTableId) {
		$this->prizeTableId = $prizeTableId;
	}

	public function withPrizeTableId(?string $prizeTableId): PrizeTable {
		$this->prizeTableId = $prizeTableId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): PrizeTable {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): PrizeTable {
		$this->metadata = $metadata;
		return $this;
	}

	public function getPrizes(): ?array {
		return $this->prizes;
	}

	public function setPrizes(?array $prizes) {
		$this->prizes = $prizes;
	}

	public function withPrizes(?array $prizes): PrizeTable {
		$this->prizes = $prizes;
		return $this;
	}

    public static function fromJson(?array $data): ?PrizeTable {
        if ($data === null) {
            return null;
        }
        return (new PrizeTable())
            ->withPrizeTableId(empty($data['prizeTableId']) ? null : $data['prizeTableId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withPrizes(array_map(
                function ($item) {
                    return Prize::fromJson($item);
                },
                array_key_exists('prizes', $data) && $data['prizes'] !== null ? $data['prizes'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "prizeTableId" => $this->getPrizeTableId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "prizes" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getPrizes() !== null && $this->getPrizes() !== null ? $this->getPrizes() : []
            ),
        );
    }
}