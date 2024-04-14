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

namespace Gs2\Watch\Model;

use Gs2\Core\Model\IModel;


class StatsEvent implements IModel {
	/**
     * @var string
	 */
	private $grn;
	/**
     * @var string
	 */
	private $service;
	/**
     * @var string
	 */
	private $method;
	/**
     * @var string
	 */
	private $metric;
	/**
     * @var bool
	 */
	private $cumulative;
	/**
     * @var float
	 */
	private $value;
	/**
     * @var array
	 */
	private $tags;
	/**
     * @var int
	 */
	private $callAt;
	public function getGrn(): ?string {
		return $this->grn;
	}
	public function setGrn(?string $grn) {
		$this->grn = $grn;
	}
	public function withGrn(?string $grn): StatsEvent {
		$this->grn = $grn;
		return $this;
	}
	public function getService(): ?string {
		return $this->service;
	}
	public function setService(?string $service) {
		$this->service = $service;
	}
	public function withService(?string $service): StatsEvent {
		$this->service = $service;
		return $this;
	}
	public function getMethod(): ?string {
		return $this->method;
	}
	public function setMethod(?string $method) {
		$this->method = $method;
	}
	public function withMethod(?string $method): StatsEvent {
		$this->method = $method;
		return $this;
	}
	public function getMetric(): ?string {
		return $this->metric;
	}
	public function setMetric(?string $metric) {
		$this->metric = $metric;
	}
	public function withMetric(?string $metric): StatsEvent {
		$this->metric = $metric;
		return $this;
	}
	public function getCumulative(): ?bool {
		return $this->cumulative;
	}
	public function setCumulative(?bool $cumulative) {
		$this->cumulative = $cumulative;
	}
	public function withCumulative(?bool $cumulative): StatsEvent {
		$this->cumulative = $cumulative;
		return $this;
	}
	public function getValue(): ?float {
		return $this->value;
	}
	public function setValue(?float $value) {
		$this->value = $value;
	}
	public function withValue(?float $value): StatsEvent {
		$this->value = $value;
		return $this;
	}
	public function getTags(): ?array {
		return $this->tags;
	}
	public function setTags(?array $tags) {
		$this->tags = $tags;
	}
	public function withTags(?array $tags): StatsEvent {
		$this->tags = $tags;
		return $this;
	}
	public function getCallAt(): ?int {
		return $this->callAt;
	}
	public function setCallAt(?int $callAt) {
		$this->callAt = $callAt;
	}
	public function withCallAt(?int $callAt): StatsEvent {
		$this->callAt = $callAt;
		return $this;
	}

    public static function fromJson(?array $data): ?StatsEvent {
        if ($data === null) {
            return null;
        }
        return (new StatsEvent())
            ->withGrn(array_key_exists('grn', $data) && $data['grn'] !== null ? $data['grn'] : null)
            ->withService(array_key_exists('service', $data) && $data['service'] !== null ? $data['service'] : null)
            ->withMethod(array_key_exists('method', $data) && $data['method'] !== null ? $data['method'] : null)
            ->withMetric(array_key_exists('metric', $data) && $data['metric'] !== null ? $data['metric'] : null)
            ->withCumulative(array_key_exists('cumulative', $data) ? $data['cumulative'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null)
            ->withTags(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('tags', $data) && $data['tags'] !== null ? $data['tags'] : []
            ))
            ->withCallAt(array_key_exists('callAt', $data) && $data['callAt'] !== null ? $data['callAt'] : null);
    }

    public function toJson(): array {
        return array(
            "grn" => $this->getGrn(),
            "service" => $this->getService(),
            "method" => $this->getMethod(),
            "metric" => $this->getMetric(),
            "cumulative" => $this->getCumulative(),
            "value" => $this->getValue(),
            "tags" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getTags() !== null && $this->getTags() !== null ? $this->getTags() : []
            ),
            "callAt" => $this->getCallAt(),
        );
    }
}